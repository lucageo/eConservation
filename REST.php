$view = new view();
$view->name = 'econservation_rest_service';
$view->description = '';
$view->tag = 'default';
$view->base_table = 'node';
$view->human_name = 'econservation_rest_service';
$view->core = 7;
$view->api_version = '3.0';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

/* Display: Master */
$handler = $view->new_display('default', 'Master', 'default');
$handler->display->display_options['title'] = 'Country Master';
$handler->display->display_options['use_more_always'] = FALSE;
$handler->display->display_options['access']['type'] = 'perm';
$handler->display->display_options['cache']['type'] = 'none';
$handler->display->display_options['query']['type'] = 'views_query';
$handler->display->display_options['exposed_form']['type'] = 'better_exposed_filters';
$handler->display->display_options['exposed_form']['options']['reset_button'] = TRUE;
$handler->display->display_options['exposed_form']['options']['bef'] = array(
  'general' => array(
    'allow_secondary' => 0,
    'secondary_label' => 'Advanced options',
  ),
  'field_project_taxonomy_tid_selective' => array(
    'bef_format' => 'default',
    'more_options' => array(
      'bef_select_all_none' => FALSE,
      'bef_collapsible' => 0,
      'is_secondary' => 0,
      'any_label' => '',
      'bef_filter_description' => '',
      'tokens' => array(
        'available' => array(
          0 => 'global_types',
        ),
      ),
      'rewrite' => array(
        'filter_rewrite_values' => '',
      ),
    ),
  ),
  'field_project_budget_usd_value' => array(
    'bef_format' => 'bef_slider',
    'slider_options' => array(
      'bef_slider_min' => '10000',
      'bef_slider_max' => '1000000000',
      'bef_slider_step' => '10000',
      'bef_slider_animate' => 'fast',
      'bef_slider_orientation' => 'horizontal',
    ),
    'more_options' => array(
      'is_secondary' => 0,
      'any_label' => '',
      'bef_filter_description' => '',
      'tokens' => array(
        'available' => array(
          0 => 'global_types',
        ),
      ),
      'rewrite' => array(
        'filter_rewrite_values' => '',
      ),
    ),
  ),
  'title_selective' => array(
    'bef_format' => 'default',
    'more_options' => array(
      'bef_select_all_none' => FALSE,
      'bef_collapsible' => 0,
      'is_secondary' => 0,
      'any_label' => '',
      'bef_filter_description' => '',
      'tokens' => array(
        'available' => array(
          0 => 'global_types',
        ),
      ),
      'rewrite' => array(
        'filter_rewrite_values' => '',
      ),
    ),
  ),
);
$handler->display->display_options['pager']['type'] = 'some';
$handler->display->display_options['pager']['options']['items_per_page'] = '10';
$handler->display->display_options['pager']['options']['offset'] = '0';
$handler->display->display_options['style_plugin'] = 'default';
$handler->display->display_options['row_plugin'] = 'fields';
/* Header: Global: Text area */
$handler->display->display_options['header']['area']['id'] = 'area';
$handler->display->display_options['header']['area']['table'] = 'views';
$handler->display->display_options['header']['area']['field'] = 'area';
/* Footer: Global: Text area */
$handler->display->display_options['footer']['area']['id'] = 'area';
$handler->display->display_options['footer']['area']['table'] = 'views';
$handler->display->display_options['footer']['area']['field'] = 'area';
/* Relationship: Entity Reference: Referencing entity */
$handler->display->display_options['relationships']['reverse_field_site_project_s__node']['id'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['relationships']['reverse_field_site_project_s__node']['table'] = 'node';
$handler->display->display_options['relationships']['reverse_field_site_project_s__node']['field'] = 'reverse_field_site_project_s__node';
/* Relationship: Entity Reference: Referencing entity */
$handler->display->display_options['relationships']['reverse_field_donor_project_s__node']['id'] = 'reverse_field_donor_project_s__node';
$handler->display->display_options['relationships']['reverse_field_donor_project_s__node']['table'] = 'node';
$handler->display->display_options['relationships']['reverse_field_donor_project_s__node']['field'] = 'reverse_field_donor_project_s__node';
/* Field: Content: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['label'] = '';
$handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
$handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
/* Field: Content: Title */
$handler->display->display_options['fields']['title_1']['id'] = 'title_1';
$handler->display->display_options['fields']['title_1']['table'] = 'node';
$handler->display->display_options['fields']['title_1']['field'] = 'title';
$handler->display->display_options['fields']['title_1']['relationship'] = 'reverse_field_site_project_s__node';
/* Field: Content: site_wkt */
$handler->display->display_options['fields']['field_site_wkt']['id'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['table'] = 'field_data_field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['field'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['fields']['field_site_wkt']['click_sort_column'] = 'geom';
$handler->display->display_options['fields']['field_site_wkt']['settings'] = array(
  'data' => 'full',
);
/* Field: Content: project_budget_usd */
$handler->display->display_options['fields']['field_project_budget_usd']['id'] = 'field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['table'] = 'field_data_field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['field'] = 'field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['settings'] = array(
  'thousand_separator' => ' ',
  'decimal_separator' => '.',
  'scale' => '0',
  'prefix_suffix' => 1,
);
/* Field: Content: project_link */
$handler->display->display_options['fields']['field_project_link']['id'] = 'field_project_link';
$handler->display->display_options['fields']['field_project_link']['table'] = 'field_data_field_project_link';
$handler->display->display_options['fields']['field_project_link']['field'] = 'field_project_link';
/* Field: Content: project_category */
$handler->display->display_options['fields']['field_project_category']['id'] = 'field_project_category';
$handler->display->display_options['fields']['field_project_category']['table'] = 'field_data_field_project_category';
$handler->display->display_options['fields']['field_project_category']['field'] = 'field_project_category';
/* Field: Content: project_source */
$handler->display->display_options['fields']['field_project_source']['id'] = 'field_project_source';
$handler->display->display_options['fields']['field_project_source']['table'] = 'field_data_field_project_source';
$handler->display->display_options['fields']['field_project_source']['field'] = 'field_project_source';
/* Field: Content: project_start_date */
$handler->display->display_options['fields']['field_project_start_date']['id'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['table'] = 'field_data_field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['field'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['settings'] = array(
  'format_type' => 'long',
  'fromto' => 'both',
  'multiple_number' => '',
  'multiple_from' => '',
  'multiple_to' => '',
  'show_repeat_rule' => 'show',
);
/* Field: Content: project_activity_status */
$handler->display->display_options['fields']['field_project_activity_status']['id'] = 'field_project_activity_status';
$handler->display->display_options['fields']['field_project_activity_status']['table'] = 'field_data_field_project_activity_status';
$handler->display->display_options['fields']['field_project_activity_status']['field'] = 'field_project_activity_status';
/* Field: Content: Title */
$handler->display->display_options['fields']['title_2']['id'] = 'title_2';
$handler->display->display_options['fields']['title_2']['table'] = 'node';
$handler->display->display_options['fields']['title_2']['field'] = 'title';
$handler->display->display_options['fields']['title_2']['relationship'] = 'reverse_field_donor_project_s__node';
/* Field: Content: project_taxonomy */
$handler->display->display_options['fields']['field_project_taxonomy']['id'] = 'field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['table'] = 'field_data_field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['field'] = 'field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['exclude'] = TRUE;
/* Sort criterion: Content: Post date */
$handler->display->display_options['sorts']['created']['id'] = 'created';
$handler->display->display_options['sorts']['created']['table'] = 'node';
$handler->display->display_options['sorts']['created']['field'] = 'created';
$handler->display->display_options['sorts']['created']['order'] = 'DESC';
/* Contextual filter: Content: project_country_iso(s) (field_project_country_iso_s_) */
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['id'] = 'field_project_country_iso_s__value';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['table'] = 'field_data_field_project_country_iso_s_';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['field'] = 'field_project_country_iso_s__value';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['default_action'] = 'default';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['default_argument_type'] = 'raw';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['default_argument_options']['index'] = '1';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['default_argument_options']['use_alias'] = TRUE;
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['summary']['number_of_records'] = '0';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['summary_options']['items_per_page'] = '25';
$handler->display->display_options['arguments']['field_project_country_iso_s__value']['limit'] = '0';
/* Contextual filter: Content: site_country_iso2 (field_site_country_iso2) */
$handler->display->display_options['arguments']['field_site_country_iso2_value']['id'] = 'field_site_country_iso2_value';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['table'] = 'field_data_field_site_country_iso2';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['field'] = 'field_site_country_iso2_value';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_action'] = 'default';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_argument_type'] = 'raw';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_argument_options']['index'] = '1';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_argument_options']['use_alias'] = TRUE;
$handler->display->display_options['arguments']['field_site_country_iso2_value']['summary']['number_of_records'] = '0';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['summary_options']['items_per_page'] = '25';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['limit'] = '0';
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 1;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: Content: Type */
$handler->display->display_options['filters']['type']['id'] = 'type';
$handler->display->display_options['filters']['type']['table'] = 'node';
$handler->display->display_options['filters']['type']['field'] = 'type';
$handler->display->display_options['filters']['type']['value'] = array(
  'project_master' => 'project_master',
);
/* Filter criterion: project_taxonomy (field_project_taxonomy) (selective) */
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['id'] = 'field_project_taxonomy_tid_selective';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['table'] = 'field_data_field_project_taxonomy';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['field'] = 'field_project_taxonomy_tid_selective';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['ui_name'] = 'project_taxonomy (field_project_taxonomy) (selective)';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['operator_id'] = '';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['label'] = 'project_taxonomy (field_project_taxonomy) (selective)';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['identifier'] = 'field_project_taxonomy_tid_selective';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['selective_display_field'] = 'field_project_taxonomy';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['selective_items_limit'] = '100';

/* Display: Leaflet Map */
$handler = $view->new_display('page', 'Leaflet Map', 'page');
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'leaflet';
$handler->display->display_options['style_options']['entity_type'] = 'node';
$handler->display->display_options['style_options']['data_source'] = 'field_site_wkt';
$handler->display->display_options['style_options']['name_field'] = 'title';
$handler->display->display_options['style_options']['description_field'] = 'nothing';
$handler->display->display_options['style_options']['map'] = 'mapbox-warden';
$handler->display->display_options['style_options']['height'] = '600';
$handler->display->display_options['style_options']['hide_empty'] = 0;
$handler->display->display_options['style_options']['zoom']['initialZoom'] = '-1';
$handler->display->display_options['style_options']['zoom']['minZoom'] = '0';
$handler->display->display_options['style_options']['zoom']['maxZoom'] = '12';
$handler->display->display_options['style_options']['vector_display']['stroke'] = 0;
$handler->display->display_options['style_options']['vector_display']['fill'] = 0;
$handler->display->display_options['style_options']['vector_display']['clickable'] = 0;
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['exposed_block'] = TRUE;
$handler->display->display_options['defaults']['header'] = FALSE;
$handler->display->display_options['defaults']['empty'] = FALSE;
/* No results behavior: Global: Text area */
$handler->display->display_options['empty']['area']['id'] = 'area';
$handler->display->display_options['empty']['area']['table'] = 'views';
$handler->display->display_options['empty']['area']['field'] = 'area';
$handler->display->display_options['empty']['area']['empty'] = TRUE;
$handler->display->display_options['empty']['area']['content'] = '<i class="fa fa-meh-o fa-5x"></i>
<br>
<b>NO MATCHING RESULTS</b>
<br>
<p> You have two options: </p> 
<br>
<p style="font-weight:100;">Select another country from the dropdown list.</p> 
<p style="font-weight:100;">Use the reset button below to refresh the page.</p> 
<br>
<a id="resetdonor" href="/country/%1" <i class="fa fa-repeat fa-3x"</i></a><span>';
$handler->display->display_options['empty']['area']['format'] = 'full_html';
$handler->display->display_options['empty']['area']['tokenize'] = TRUE;
$handler->display->display_options['defaults']['fields'] = FALSE;
/* Field: Content: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['label'] = '';
$handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
$handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
/* Field: Content: Title */
$handler->display->display_options['fields']['title_1']['id'] = 'title_1';
$handler->display->display_options['fields']['title_1']['table'] = 'node';
$handler->display->display_options['fields']['title_1']['field'] = 'title';
$handler->display->display_options['fields']['title_1']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['fields']['title_1']['label'] = 'Site';
/* Field: Content: site_wkt */
$handler->display->display_options['fields']['field_site_wkt']['id'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['table'] = 'field_data_field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['field'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['fields']['field_site_wkt']['click_sort_column'] = 'geom';
$handler->display->display_options['fields']['field_site_wkt']['settings'] = array(
  'data' => 'full',
);
/* Field: Content: project_budget_usd */
$handler->display->display_options['fields']['field_project_budget_usd']['id'] = 'field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['table'] = 'field_data_field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['field'] = 'field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['element_type'] = '0';
$handler->display->display_options['fields']['field_project_budget_usd']['element_default_classes'] = FALSE;
$handler->display->display_options['fields']['field_project_budget_usd']['settings'] = array(
  'thousand_separator' => ',',
  'decimal_separator' => '.',
  'scale' => '0',
  'prefix_suffix' => 0,
);
/* Field: Content: project_link */
$handler->display->display_options['fields']['field_project_link']['id'] = 'field_project_link';
$handler->display->display_options['fields']['field_project_link']['table'] = 'field_data_field_project_link';
$handler->display->display_options['fields']['field_project_link']['field'] = 'field_project_link';
/* Field: Content: project_category */
$handler->display->display_options['fields']['field_project_category']['id'] = 'field_project_category';
$handler->display->display_options['fields']['field_project_category']['table'] = 'field_data_field_project_category';
$handler->display->display_options['fields']['field_project_category']['field'] = 'field_project_category';
/* Field: Content: project_source */
$handler->display->display_options['fields']['field_project_source']['id'] = 'field_project_source';
$handler->display->display_options['fields']['field_project_source']['table'] = 'field_data_field_project_source';
$handler->display->display_options['fields']['field_project_source']['field'] = 'field_project_source';
/* Field: Content: project_start_date */
$handler->display->display_options['fields']['field_project_start_date']['id'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['table'] = 'field_data_field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['field'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['type'] = 'date_plain';
$handler->display->display_options['fields']['field_project_start_date']['settings'] = array(
  'format_type' => 'short',
  'fromto' => 'value',
  'multiple_number' => '',
  'multiple_from' => '',
  'multiple_to' => '',
);
/* Field: Content: project_activity_status */
$handler->display->display_options['fields']['field_project_activity_status']['id'] = 'field_project_activity_status';
$handler->display->display_options['fields']['field_project_activity_status']['table'] = 'field_data_field_project_activity_status';
$handler->display->display_options['fields']['field_project_activity_status']['field'] = 'field_project_activity_status';
/* Field: Content: Title */
$handler->display->display_options['fields']['title_2']['id'] = 'title_2';
$handler->display->display_options['fields']['title_2']['table'] = 'node';
$handler->display->display_options['fields']['title_2']['field'] = 'title';
$handler->display->display_options['fields']['title_2']['relationship'] = 'reverse_field_donor_project_s__node';
$handler->display->display_options['fields']['title_2']['label'] = 'Donor';
/* Field: Content: project_taxonomy */
$handler->display->display_options['fields']['field_project_taxonomy']['id'] = 'field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['table'] = 'field_data_field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['field'] = 'field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['exclude'] = TRUE;
/* Field: Content: project_end_date */
$handler->display->display_options['fields']['field_project_end_date']['id'] = 'field_project_end_date';
$handler->display->display_options['fields']['field_project_end_date']['table'] = 'field_data_field_project_end_date';
$handler->display->display_options['fields']['field_project_end_date']['field'] = 'field_project_end_date';
$handler->display->display_options['fields']['field_project_end_date']['type'] = 'date_plain';
$handler->display->display_options['fields']['field_project_end_date']['settings'] = array(
  'format_type' => 'short',
  'fromto' => '',
  'multiple_number' => '',
  'multiple_from' => '',
  'multiple_to' => '',
);
/* Field: Content: Title */
$handler->display->display_options['fields']['title_3']['id'] = 'title_3';
$handler->display->display_options['fields']['title_3']['table'] = 'node';
$handler->display->display_options['fields']['title_3']['field'] = 'title';
$handler->display->display_options['fields']['title_3']['relationship'] = 'reverse_field_site_project_s__node';
/* Field: Content: project_start_date */
$handler->display->display_options['fields']['field_project_start_date_1']['id'] = 'field_project_start_date_1';
$handler->display->display_options['fields']['field_project_start_date_1']['table'] = 'field_data_field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date_1']['field'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date_1']['settings'] = array(
  'format_type' => 'short',
  'fromto' => 'both',
  'multiple_number' => '',
  'multiple_from' => '',
  'multiple_to' => '',
  'show_repeat_rule' => 'show',
);
/* Field: Global: Custom text */
$handler->display->display_options['fields']['nothing']['id'] = 'nothing';
$handler->display->display_options['fields']['nothing']['table'] = 'views';
$handler->display->display_options['fields']['nothing']['field'] = 'nothing';
$handler->display->display_options['fields']['nothing']['alter']['text'] = '<hr>
<p>WHERE <span class="smalltext"> [title_3]  </span></p>
<hr>
<p>WHEN <span class="smalltext"> [field_project_start_date_1]  </span></p>
<hr>
<p>STATUS<span class="smalltext"> [field_project_activity_status]  </span></p>
<hr>
<p>CATEGORY<span class="smalltext"> [field_project_category] </span></p>
<hr>
<p>OVERALL PROJECT FUNDING <span class="smalltext"> [field_project_budget_usd] </span> $.</p>
<br>
<i class="fa fa-info-circle" aria-hidden="true"></i> The Project Funding value is related to the entire project and not to this pecific Site.';
$handler->display->display_options['defaults']['arguments'] = FALSE;
/* Contextual filter: Content: site_country_iso2 (field_site_country_iso2) */
$handler->display->display_options['arguments']['field_site_country_iso2_value']['id'] = 'field_site_country_iso2_value';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['table'] = 'field_data_field_site_country_iso2';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['field'] = 'field_site_country_iso2_value';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_action'] = 'default';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_argument_type'] = 'raw';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_argument_options']['index'] = '1';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['default_argument_options']['use_alias'] = TRUE;
$handler->display->display_options['arguments']['field_site_country_iso2_value']['summary']['number_of_records'] = '0';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['summary_options']['items_per_page'] = '25';
$handler->display->display_options['arguments']['field_site_country_iso2_value']['limit'] = '0';
$handler->display->display_options['defaults']['filter_groups'] = FALSE;
$handler->display->display_options['defaults']['filters'] = FALSE;
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 1;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: Content: Type */
$handler->display->display_options['filters']['type']['id'] = 'type';
$handler->display->display_options['filters']['type']['table'] = 'node';
$handler->display->display_options['filters']['type']['field'] = 'type';
$handler->display->display_options['filters']['type']['value'] = array(
  'project_master' => 'project_master',
);
/* Filter criterion: project_taxonomy (field_project_taxonomy) (selective) */
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['id'] = 'field_project_taxonomy_tid_selective';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['table'] = 'field_data_field_project_taxonomy';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['field'] = 'field_project_taxonomy_tid_selective';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['ui_name'] = 'project_taxonomy (field_project_taxonomy) (selective)';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['operator_id'] = '';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['label'] = 'PROJECT';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['identifier'] = 'field_project_taxonomy_tid_selective';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['selective_display_field'] = 'field_project_taxonomy';
$handler->display->display_options['filters']['field_project_taxonomy_tid_selective']['selective_items_limit'] = '100';
/* Filter criterion: Content: project_budget_usd (field_project_budget_usd) */
$handler->display->display_options['filters']['field_project_budget_usd_value']['id'] = 'field_project_budget_usd_value';
$handler->display->display_options['filters']['field_project_budget_usd_value']['table'] = 'field_data_field_project_budget_usd';
$handler->display->display_options['filters']['field_project_budget_usd_value']['field'] = 'field_project_budget_usd_value';
$handler->display->display_options['filters']['field_project_budget_usd_value']['operator'] = '>=';
$handler->display->display_options['filters']['field_project_budget_usd_value']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_budget_usd_value']['expose']['operator_id'] = 'field_project_budget_usd_value_op';
$handler->display->display_options['filters']['field_project_budget_usd_value']['expose']['label'] = 'BUDGET GREATER THAN';
$handler->display->display_options['filters']['field_project_budget_usd_value']['expose']['operator'] = 'field_project_budget_usd_value_op';
$handler->display->display_options['filters']['field_project_budget_usd_value']['expose']['identifier'] = 'field_project_budget_usd_value';
$handler->display->display_options['filters']['field_project_budget_usd_value']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
/* Filter criterion: Title (selective) */
$handler->display->display_options['filters']['title_selective']['id'] = 'title_selective';
$handler->display->display_options['filters']['title_selective']['table'] = 'node';
$handler->display->display_options['filters']['title_selective']['field'] = 'title_selective';
$handler->display->display_options['filters']['title_selective']['relationship'] = 'reverse_field_donor_project_s__node';
$handler->display->display_options['filters']['title_selective']['ui_name'] = 'Title (selective)';
$handler->display->display_options['filters']['title_selective']['exposed'] = TRUE;
$handler->display->display_options['filters']['title_selective']['expose']['operator_id'] = '';
$handler->display->display_options['filters']['title_selective']['expose']['label'] = 'DONOR';
$handler->display->display_options['filters']['title_selective']['expose']['identifier'] = 'title_selective';
$handler->display->display_options['filters']['title_selective']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['filters']['title_selective']['selective_display_field'] = 'title_2';
$handler->display->display_options['filters']['title_selective']['selective_items_limit'] = '100';
/* Filter criterion: project_start_date -  start date (field_project_start_date) (selective) */
$handler->display->display_options['filters']['field_project_start_date_value_selective']['id'] = 'field_project_start_date_value_selective';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['table'] = 'field_data_field_project_start_date';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['field'] = 'field_project_start_date_value_selective';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['ui_name'] = 'project_start_date -  start date (field_project_start_date) (selective)';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_start_date_value_selective']['expose']['operator_id'] = '';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['expose']['label'] = 'START';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['expose']['identifier'] = 'field_project_start_date_value_selective';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['filters']['field_project_start_date_value_selective']['selective_display_field'] = 'field_project_start_date';
$handler->display->display_options['filters']['field_project_start_date_value_selective']['selective_items_limit'] = '100';
/* Filter criterion: project_end_date (field_project_end_date) (selective) */
$handler->display->display_options['filters']['field_project_end_date_value_selective']['id'] = 'field_project_end_date_value_selective';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['table'] = 'field_data_field_project_end_date';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['field'] = 'field_project_end_date_value_selective';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['ui_name'] = 'project_end_date (field_project_end_date) (selective)';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_end_date_value_selective']['expose']['operator_id'] = '';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['expose']['label'] = 'END';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['expose']['identifier'] = 'field_project_end_date_value_selective';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['filters']['field_project_end_date_value_selective']['selective_display_field'] = 'field_project_end_date';
$handler->display->display_options['filters']['field_project_end_date_value_selective']['selective_items_limit'] = '100';
/* Filter criterion: Content: Title */
$handler->display->display_options['filters']['title']['id'] = 'title';
$handler->display->display_options['filters']['title']['table'] = 'node';
$handler->display->display_options['filters']['title']['field'] = 'title';
$handler->display->display_options['filters']['title']['exposed'] = TRUE;
$handler->display->display_options['filters']['title']['expose']['operator_id'] = 'title_op';
$handler->display->display_options['filters']['title']['expose']['label'] = 'Title';
$handler->display->display_options['filters']['title']['expose']['operator'] = 'title_op';
$handler->display->display_options['filters']['title']['expose']['identifier'] = 'title_graph1';
$handler->display->display_options['filters']['title']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
/* Filter criterion: Content: project_category (field_project_category) */
$handler->display->display_options['filters']['field_project_category_value']['id'] = 'field_project_category_value';
$handler->display->display_options['filters']['field_project_category_value']['table'] = 'field_data_field_project_category';
$handler->display->display_options['filters']['field_project_category_value']['field'] = 'field_project_category_value';
$handler->display->display_options['filters']['field_project_category_value']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_category_value']['expose']['operator_id'] = 'field_project_category_value_op';
$handler->display->display_options['filters']['field_project_category_value']['expose']['label'] = 'project_category (field_project_category)';
$handler->display->display_options['filters']['field_project_category_value']['expose']['operator'] = 'field_project_category_value_op';
$handler->display->display_options['filters']['field_project_category_value']['expose']['identifier'] = 'field_project_category_value';
$handler->display->display_options['filters']['field_project_category_value']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
/* Filter criterion: Content: project_year (field_project_year) */
$handler->display->display_options['filters']['field_project_year_value']['id'] = 'field_project_year_value';
$handler->display->display_options['filters']['field_project_year_value']['table'] = 'field_data_field_project_year';
$handler->display->display_options['filters']['field_project_year_value']['field'] = 'field_project_year_value';
$handler->display->display_options['filters']['field_project_year_value']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_project_year_value']['expose']['operator_id'] = 'field_project_year_value_op';
$handler->display->display_options['filters']['field_project_year_value']['expose']['label'] = 'project_year (field_project_year)';
$handler->display->display_options['filters']['field_project_year_value']['expose']['operator'] = 'field_project_year_value_op';
$handler->display->display_options['filters']['field_project_year_value']['expose']['identifier'] = 'field_project_year_value';
$handler->display->display_options['filters']['field_project_year_value']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['path'] = 'country-master';

/* Display: Services */
$handler = $view->new_display('services', 'Services', 'services_1');
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'none';
$handler->display->display_options['pager']['options']['offset'] = '0';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'default';
$handler->display->display_options['style_options']['default_row_class'] = FALSE;
$handler->display->display_options['style_options']['row_class_special'] = FALSE;
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'fields';
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['fields'] = FALSE;
/* Field: Content: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['label'] = '';
$handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
$handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
/* Field: Content: Title */
$handler->display->display_options['fields']['title_1']['id'] = 'title_1';
$handler->display->display_options['fields']['title_1']['table'] = 'node';
$handler->display->display_options['fields']['title_1']['field'] = 'title';
$handler->display->display_options['fields']['title_1']['relationship'] = 'reverse_field_site_project_s__node';
/* Field: Content: site_wkt */
$handler->display->display_options['fields']['field_site_wkt']['id'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['table'] = 'field_data_field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['field'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['fields']['field_site_wkt']['label'] = 'lat';
$handler->display->display_options['fields']['field_site_wkt']['click_sort_column'] = 'geom';
$handler->display->display_options['fields']['field_site_wkt']['type'] = 'geofield_lat';
$handler->display->display_options['fields']['field_site_wkt']['settings'] = array(
  'data' => 'full',
  'format' => 'decimal_degrees',
);
/* Field: Content: project_budget_usd */
$handler->display->display_options['fields']['field_project_budget_usd']['id'] = 'field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['table'] = 'field_data_field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['field'] = 'field_project_budget_usd';
$handler->display->display_options['fields']['field_project_budget_usd']['settings'] = array(
  'thousand_separator' => ' ',
  'decimal_separator' => '.',
  'scale' => '0',
  'prefix_suffix' => 1,
);
/* Field: Content: project_link */
$handler->display->display_options['fields']['field_project_link']['id'] = 'field_project_link';
$handler->display->display_options['fields']['field_project_link']['table'] = 'field_data_field_project_link';
$handler->display->display_options['fields']['field_project_link']['field'] = 'field_project_link';
/* Field: Content: project_category */
$handler->display->display_options['fields']['field_project_category']['id'] = 'field_project_category';
$handler->display->display_options['fields']['field_project_category']['table'] = 'field_data_field_project_category';
$handler->display->display_options['fields']['field_project_category']['field'] = 'field_project_category';
/* Field: Content: project_source */
$handler->display->display_options['fields']['field_project_source']['id'] = 'field_project_source';
$handler->display->display_options['fields']['field_project_source']['table'] = 'field_data_field_project_source';
$handler->display->display_options['fields']['field_project_source']['field'] = 'field_project_source';
/* Field: Content: project_start_date */
$handler->display->display_options['fields']['field_project_start_date']['id'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['table'] = 'field_data_field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['field'] = 'field_project_start_date';
$handler->display->display_options['fields']['field_project_start_date']['settings'] = array(
  'format_type' => 'long',
  'fromto' => 'both',
  'multiple_number' => '',
  'multiple_from' => '',
  'multiple_to' => '',
  'show_repeat_rule' => 'show',
);
/* Field: Content: project_activity_status */
$handler->display->display_options['fields']['field_project_activity_status']['id'] = 'field_project_activity_status';
$handler->display->display_options['fields']['field_project_activity_status']['table'] = 'field_data_field_project_activity_status';
$handler->display->display_options['fields']['field_project_activity_status']['field'] = 'field_project_activity_status';
/* Field: Content: Title */
$handler->display->display_options['fields']['title_2']['id'] = 'title_2';
$handler->display->display_options['fields']['title_2']['table'] = 'node';
$handler->display->display_options['fields']['title_2']['field'] = 'title';
$handler->display->display_options['fields']['title_2']['relationship'] = 'reverse_field_donor_project_s__node';
/* Field: Content: project_taxonomy */
$handler->display->display_options['fields']['field_project_taxonomy']['id'] = 'field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['table'] = 'field_data_field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['field'] = 'field_project_taxonomy';
$handler->display->display_options['fields']['field_project_taxonomy']['exclude'] = TRUE;
/* Field: Content: site_wkt */
$handler->display->display_options['fields']['field_site_wkt_1']['id'] = 'field_site_wkt_1';
$handler->display->display_options['fields']['field_site_wkt_1']['table'] = 'field_data_field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt_1']['field'] = 'field_site_wkt';
$handler->display->display_options['fields']['field_site_wkt_1']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['fields']['field_site_wkt_1']['label'] = 'lon';
$handler->display->display_options['fields']['field_site_wkt_1']['click_sort_column'] = 'geom';
$handler->display->display_options['fields']['field_site_wkt_1']['type'] = 'geofield_lon';
$handler->display->display_options['fields']['field_site_wkt_1']['settings'] = array(
  'data' => 'full',
  'format' => 'decimal_degrees',
);
$handler->display->display_options['defaults']['arguments'] = FALSE;
$handler->display->display_options['defaults']['filter_groups'] = FALSE;
$handler->display->display_options['defaults']['filters'] = FALSE;
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 1;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: Content: Type */
$handler->display->display_options['filters']['type']['id'] = 'type';
$handler->display->display_options['filters']['type']['table'] = 'node';
$handler->display->display_options['filters']['type']['field'] = 'type';
$handler->display->display_options['filters']['type']['value'] = array(
  'project_master' => 'project_master',
);
/* Filter criterion: iso_2 */
$handler->display->display_options['filters']['field_site_country_iso2_value']['id'] = 'field_site_country_iso2_value';
$handler->display->display_options['filters']['field_site_country_iso2_value']['table'] = 'field_data_field_site_country_iso2';
$handler->display->display_options['filters']['field_site_country_iso2_value']['field'] = 'field_site_country_iso2_value';
$handler->display->display_options['filters']['field_site_country_iso2_value']['relationship'] = 'reverse_field_site_project_s__node';
$handler->display->display_options['filters']['field_site_country_iso2_value']['ui_name'] = 'iso_2';
$handler->display->display_options['filters']['field_site_country_iso2_value']['operator'] = 'contains';
$handler->display->display_options['filters']['field_site_country_iso2_value']['exposed'] = TRUE;
$handler->display->display_options['filters']['field_site_country_iso2_value']['expose']['operator_id'] = 'field_site_country_iso2_value_op';
$handler->display->display_options['filters']['field_site_country_iso2_value']['expose']['label'] = 'site_country_iso2 (field_site_country_iso2)';
$handler->display->display_options['filters']['field_site_country_iso2_value']['expose']['operator'] = 'field_site_country_iso2_value_op';
$handler->display->display_options['filters']['field_site_country_iso2_value']['expose']['identifier'] = 'iso2';
$handler->display->display_options['filters']['field_site_country_iso2_value']['expose']['remember_roles'] = array(
  2 => '2',
  1 => 0,
  3 => 0,
  4 => 0,
);
$handler->display->display_options['path'] = 'biopama_rest_service';
