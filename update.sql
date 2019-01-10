--REFRESH MATERIALIZED VIEWS
REFRESH MATERIALIZED VIEW geo.mv_020_country;
REFRESH MATERIALIZED VIEW geo.mv_030_country_simplified;
REFRESH MATERIALIZED VIEW geo.mv_040_wdpa;

-- CLEANUP TEMPORARY TABLES
DROP TABLE IF EXISTS tt_010_site;
DROP TABLE IF EXISTS tt_080_site_country;
DROP TABLE IF EXISTS tt_090_project_country;
DROP TABLE IF EXISTS tt_110_country_budget_project;
DROP TABLE IF EXISTS tt_130_site_wdpa;
DROP TABLE IF EXISTS tt_140_project_wdpa;
DROP TABLE IF EXISTS tt_150_wdpa_budget_project;

-- CLEANUP OUTPUT TABLES
DROP TABLE IF EXISTS geo.mt_100_project_country;
DROP TABLE IF EXISTS geo.mt_120_country_budget_project_geo;
DROP TABLE IF EXISTS geo.mt_160_wdpa_budget_project_geo_poly;
DROP TABLE IF EXISTS geo.mt_170_wdpa_atts;
DROP TABLE IF EXISTS geo.mt_180_wdpa_budget_project_geo_point;
DROP TABLE IF EXISTS geo.mt_190_site_project_country_wdpa;
DROP TABLE IF EXISTS geo.mt_200_donor_project;
DROP TABLE IF EXISTS geo.mt_210_implementing_agency_project;
DROP TABLE IF EXISTS geo.mt_191_site_project_country_wdpa_acp;

-- CREATE TEMPORARY TABLE tt_010_site;
CREATE TEMP TABLE tt_010_site AS
    SELECT
    a.site_id,
    a.site_name,
    a.site_latitude,
    a.site_longitude,
    a.site_country_static iso2,
    a.site_wdpaid::integer wdpaid,
    st_setsrid(st_point(a.site_longitude::double precision, a.site_latitude::double precision), 4326) AS geom,
    st_astext(st_setsrid(st_point(a.site_longitude::double precision, a.site_latitude::double precision), 4326)) AS st_astext,
    st_asewkt(st_setsrid(st_point(a.site_longitude::double precision, a.site_latitude::double precision), 4326)) AS st_asewkt,
    (b.precision_code || '.'::text) || b.precision_description AS site_precision
    FROM econservation.mt_site a
    LEFT JOIN econservation.mt_site_precision b ON a.site_id_precision = b.precision_id;

-- CREATE TEMPORARY TABLE tt_080_site_country;
CREATE TEMP TABLE tt_080_site_country AS
    SELECT
    a.site_id,
    a.iso2
    FROM tt_010_site a;


-- CREATE TEMPORARY TABLE tt_090_project_country;
CREATE TEMP TABLE tt_090_project_country AS
    SELECT
    a.id_project project_id,
    b.iso2::text
    FROM econservation.lt_project_site a
    LEFT JOIN tt_080_site_country b
    ON a.id_site = b.site_id
    GROUP BY a.id_project, b.iso2;

-- CREATE OUTPUT TABLE geo.mt_100_project_country
CREATE TABLE geo.mt_100_project_country AS
SELECT
    a.project_id,
    a.project_name,
    a.project_description,
    a.project_link,
        array_to_string(ARRAY( SELECT (c.project_category_id || '.'::text) || c.category
        FROM econservation.lt_project_category b JOIN econservation.mt_project_category c ON b.id_category = c.project_category_id
        WHERE a.project_id = b.id_project), ','::text) AS
    project_category,
    a.project_budget::numeric::double precision * f.exchange_rate AS project_budget_usd,
    a.project_budget_donor_contribution::numeric::double precision * f.exchange_rate AS project_budget_donor_contibution_usd,
    a.project_budget_biodiversity,  
    a.project_budget::numeric AS project_budget_original_currency,
    e.currency_name,
    a.project_start_date,
    a.project_end_date,
        to_char(a.project_start_date::timestamp with time zone, 'YYYY'::text) AS
    project_year,
        CASE
            WHEN 'now'::text::date < a.project_end_date THEN 'Active'::text
            ELSE 'Closed'::text
        END AS
    project_activity_status,
        array_to_string(ARRAY(SELECT h.id_site AS site_id
        FROM econservation.lt_project_site h
        WHERE a.project_id = h.id_project), ','::text) AS
    project_site_id,
        array_to_string(ARRAY( SELECT g.id_implementing_agency
        FROM econservation.lt_project_implementing_agency g
        WHERE a.project_id = g.id_project), ','::text) AS
    implementing_agency_id,
        array_to_string(ARRAY( SELECT i.id_donor
        FROM econservation.lt_project_donor i
        WHERE a.project_id = i.id_project), ','::text) AS
    project_donor_id,
    a.project_program,
        array_to_string(ARRAY(SELECT z.iso2
        FROM tt_090_project_country z
        WHERE a.project_id = z.project_id), ','::text) AS
    project_country_id
   FROM econservation.mt_project a
     LEFT JOIN econservation.mt_currency e ON a.project_id_currency = e.currency_id
     LEFT JOIN econservation.lt_currency_exchange_rate f ON a.project_id_currency = f.id_currency AND date_part('year'::text, a.project_start_date) = f.exchange_year::double precision
  ORDER BY a.project_id;
COMMENT ON TABLE geo.mt_100_project_country
    IS 'projects list with full atts and statistics||DRUPAL';
GRANT SELECT ON TABLE geo.mt_100_project_country TO h05conservationmapping;

-- CREATE TEMPORARY TABLE tt_110_country_budget_project
CREATE TEMP TABLE tt_110_country_budget_project AS
    SELECT DISTINCT
    a.iso2,
    sum(b.project_budget_usd) AS sum_budget,
    count(a.project_id) AS project_numb
    FROM tt_090_project_country a
    JOIN geo.mt_100_project_country b ON a.project_id = b.project_id
    GROUP BY a.iso2;

-- CREATE OUTPUT TABLE geo.mt_120_country_budget_project_geo
CREATE TABLE geo.mt_120_country_budget_project_geo AS
    SELECT
    a.country_name,
    a.iso2,
    b.sum_budget,
    b.project_numb,
    a.geom::geometry(MultiPolygon,4326) geom,
    st_area(a.geom) AS area,
    a.acp
    FROM geo.mv_030_country_simplified a
    JOIN tt_110_country_budget_project b ON a.iso2 = b.iso2;
CREATE INDEX mt_120_country_budget_project_geo_geom_idx
    ON geo.mt_120_country_budget_project_geo USING gist
    (geom);
COMMENT ON TABLE geo.mt_120_country_budget_project_geo
    IS 'projects list with budget by country|GEOGRAPHIC|CARTO,GEOSERVER';
GRANT SELECT ON TABLE geo.mt_120_country_budget_project_geo TO h05conservationmapping;

-- CREATE TEMPORARY TABLE tt_130_site_wdpa
CREATE TEMP TABLE tt_130_site_wdpa AS
    SELECT
    a.site_id,
    a.wdpaid
    FROM tt_010_site a;

-- CREATE TEMPORARY TABLE tt_140_site_wdpa  
CREATE TEMP TABLE tt_140_project_wdpa AS
    SELECT
    a.id_project project_id,
    b.wdpaid
    FROM econservation.lt_project_site a
    LEFT JOIN tt_130_site_wdpa b ON a.id_site = b.site_id
    GROUP BY a.id_project,b.wdpaid;

-- CREATE TEMPORARY TABLE tt_150_wdpa_budget_project
CREATE TEMP TABLE tt_150_wdpa_budget_project AS
SELECT DISTINCT
    a.wdpaid,
    sum(b.project_budget_usd) AS sum_budget,
    count(a.project_id) AS project_numb
    FROM tt_140_project_wdpa a
    JOIN geo.mt_100_project_country b ON a.project_id = b.project_id
    GROUP BY a.wdpaid;

-- CREATE OUTPUT TABLE geo.mt_160_wdpa_budget_project_geo_poly
CREATE TABLE geo.mt_160_wdpa_budget_project_geo_poly AS
SELECT
    a.wdpaid,
    b.name::text,
    a.sum_budget,
    a.project_numb,
    b.geom::geometry(MultiPolygon,4326) geom
    FROM
    tt_150_wdpa_budget_project a
    JOIN geo.mv_040_wdpa b ON a.wdpaid = b.wdpaid;
CREATE INDEX mt_160_wdpa_budget_project_geo_poly_geom_idx
    ON geo.mt_160_wdpa_budget_project_geo_poly USING gist
    (geom);
COMMENT ON TABLE geo.mt_160_wdpa_budget_project_geo_poly
    IS 'projects list with budget by protected area (poly)|GEOGRAPHIC|GEOSERVER';
GRANT SELECT ON TABLE geo.mt_160_wdpa_budget_project_geo_poly TO h05conservationmapping;

-- CREATE OUTPUT TABLE geo.mt_170_wdpa_atts
CREATE TABLE geo.mt_170_wdpa_atts AS
SELECT
a.wdpaid,
a.wdpa_pid,
a.pa_def,
a.name,
a.orig_name,
a.desig,
a.desig_eng,
a.desig_type,
a.iucn_cat,
a.int_crit,
a.marine,
a.rep_m_area,
a.gis_m_area,
a.rep_area,
a.gis_area,
a.no_take,
a.no_tk_area,
a.status,
a.status_yr,
a.gov_type,
a.own_type,
a.mang_auth,
a.mang_plan,
a.verif,
a.metadataid,
a.sub_loc,
a.parent_iso3,
a.iso3,
a.type,
a.parcels,
a.area_geo
FROM geo.mv_040_wdpa a
WHERE a.wdpaid IN (SELECT DISTINCT wdpaid FROM tt_130_site_wdpa);
COMMENT ON TABLE geo.mt_170_wdpa_atts IS 'protected areas (interested by projects) atts||DRUPAL';
GRANT SELECT ON TABLE geo.mt_170_wdpa_atts TO h05conservationmapping;

-- CREATE OUTPUT TABLE geo.mt_180_wdpa_budget_project_geo_point
CREATE TABLE geo.mt_180_wdpa_budget_project_geo_point AS
SELECT
    a.wdpaid,
    a.name::text,
    a.sum_budget,
    a.project_numb,
    ST_SETSRID(ST_MULTI(ST_Centroid(a.geom)),4326)::geometry(MultiPoint,4326) AS geom
    FROM
    geo.mt_160_wdpa_budget_project_geo_poly a;
CREATE INDEX mt_180_wdpa_budget_project_geo_point_geom_idx
    ON geo.mt_180_wdpa_budget_project_geo_point USING gist
    (geom);
COMMENT ON TABLE geo.mt_180_wdpa_budget_project_geo_point
    IS 'projects list with budget by protected area (points)|GEOGRAPHIC|GEOSERVER';
GRANT SELECT ON TABLE geo.mt_180_wdpa_budget_project_geo_point TO h05conservationmapping;


-- CREATE OUTPUT TABLE geo.mt_190_site_project_country_wdpa
CREATE TABLE geo.mt_190_site_project_country_wdpa AS
SELECT
    a.site_id,
    a.site_name,
    a.site_latitude,
    a.site_longitude,
    a.geom,
    a.st_astext,
    a.st_asewkt,
    a.site_precision,
    array_to_string(ARRAY(SELECT b.id_project
           FROM econservation.lt_project_site b
          WHERE a.site_id = b.id_site), ','::text) AS site_project_id,
    array_to_string(ARRAY(SELECT c.iso2
           FROM tt_080_site_country c
          WHERE a.site_id = c.site_id), ','::text) AS site_country_iso2,
    array_to_string(ARRAY( SELECT d.wdpaid
           FROM tt_130_site_wdpa d
          WHERE a.site_id = d.site_id), ','::text) AS site_wdpaid
   FROM tt_010_site a;
COMMENT ON TABLE geo.mt_190_site_project_country_wdpa IS 'aggegates informations about site, project, country, wdpa||CARTO';
GRANT SELECT ON TABLE geo.mt_190_site_project_country_wdpa TO h05conservationmapping;

-- CREATE OUTPUT TABLE geo.mt_200_donor_project
CREATE TABLE geo.mt_200_donor_project AS
SELECT
a.donor_id,
a.donor_name_en AS donor_name,
a.description AS donor_description,
a.donor_link,
a.donor_acronym_en AS donor_acronym,
a.donor_logo,
array_to_string(ARRAY(SELECT b.id_project
FROM econservation.lt_project_donor b
WHERE a.donor_id = b.id_donor), ','::text) AS donor_project_id
FROM econservation.mt_donor a;
COMMENT ON TABLE geo.mt_200_donor_project
IS 'donor list by project||DRUPAL';
GRANT SELECT ON TABLE geo.mt_200_donor_project TO h05conservationmapping;

-- CREATE OUTPUT TABLE geo.mt_210_implementing_agency_project
CREATE TABLE geo.mt_210_implementing_agency_project AS
SELECT
a.implementing_agency_id,
a.implementing_agency AS implementing_agency_name,
a.implementing_agency_link,
a.implementing_agency_acronym,
a.implementing_agency_logo,
array_to_string(ARRAY( SELECT b.id_project
FROM econservation.lt_project_implementing_agency b
WHERE a.implementing_agency_id::numeric = b.id_implementing_agency::numeric), ','::text) AS implementing_project_id
FROM econservation.mt_implementing_agency a;
COMMENT ON TABLE geo.mt_210_implementing_agency_project
IS 'implementing agency list by project||DRUPAL';
GRANT SELECT ON TABLE geo.mt_210_implementing_agency_project TO h05conservationmapping;


-- CREATE OUTPUT TABLE geo.mt_191_site_project_country_wdpa_acp
CREATE TABLE geo.mt_191_site_project_country_wdpa_acp AS
SELECT *
FROM geo.mt_190_site_project_country_wdpa
WHERE site_country_iso2 IN (SELECT iso2 FROM geo.mv_030_country_simplified WHERE acp is true);

GRANT SELECT ON TABLE geo.mt_191_site_project_country_wdpa_acp TO h05conservationmapping;

COMMENT ON TABLE geo.mt_191_site_project_country_wdpa_acp
    IS 'aggegates informations about site, project, country, wdpa for acp countries|GEOGRAPHIC|BIOPAMA';
