<?php

add_theme_support('post-thumbnails');

function de_scripts()
{
  wp_enqueue_style('style', get_template_directory_uri() . '/dist/css/style.css');
  wp_enqueue_script('script', get_template_directory_uri() . '/dist/js/index.js', false, false, true);
}
add_action('wp_enqueue_scripts', 'de_scripts');

function register_menus()
{
  register_nav_menu('header_menu', 'Header Menu');
  register_nav_menu('after_header_menu', 'After Header Menu');
}
add_action('init', 'register_menus');

function pt_repository()
{
  $labels = array(
    "name" => "Repositório",
    "singular_name" => "Repositório",
    "add_new" => "Adicionar novo repositório",
    "add_new_item" => "Adicionar novo repositório",
    "edit_item" => "Editar repositório",
    "new_item" => "Novo repositório",
    "view_item" => "Ver repositório",
    "view_items" => "Ver repositório",
    "search_items" => "Buscar repositório",
    "not_found" => "Nenhum repositório encontrado",
    "not_found_in_trash" => "Nenhum repositório na lixeira",
    "all_items" => "Todos repositório",
    "uploaded_to_this_item" => "Carregado para este repositório",
    "items_list" => "Lista de repositório",
    "item_updated" => "Repositório atualizado"
  );

  $args = [
    "labels" => $labels,
    "description" => "Post type to manage repository",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "query_var" => true,
    "rewrite" => ["slug" => "repositorio", "with_front" => true],
    "supports" => ["title"],
    'taxonomies' => ['period'],
  ];

  register_post_type("repository", $args);
}

function pt_youtube_embeds()
{
  $labels = array(
    "name" => "Vídeos",
    "singular_name" => "Vídeo",
    "add_new" => "Adicionar novo vídeo",
    "add_new_item" => "Adicionar novo vídeo",
    "edit_item" => "Editar vídeo",
    "new_item" => "Novo vídeo",
    "view_item" => "Ver vídeo",
    "view_items" => "Ver vídeos",
    "search_items" => "Buscar vídeos",
    "not_found" => "Nenhum vídeo encontrado",
    "not_found_in_trash" => "Nenhum vídeo na lixeira",
    "all_items" => "Todos vídeos",
    "uploaded_to_this_item" => "Carregado para este vídeo",
    "items_list" => "Lista de vídeos",
    "item_updated" => "Vídeo atualizado"
  );

  $args = [
    "labels" => $labels,
    "description" => "Post type to manage youtube embed videos",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "query_var" => true,
    "supports" => ["title"],
  ];

  register_post_type("youtube_embeds", $args);
}

function tx_period()
{
  $labels = [
    "name" => "Períodos",
    "singular_name" => "Período",
    "menu_name" => "Períodos",
    "all_items" => "Todos os períodos",
    "edit_item" => "Editar período",
    "view_item" => "Ver período",
    "update_item" => "Atualizar nome o período",
    "add_new_item" => "Adicionar novo período",
    "new_item_name" => "Novo período",
    "parent_item" => "Período ascendente",
    "parent_item_colon" => "Período ascendente:",
    "search_items" => "Pesquisar períodos",
    "popular_items" => "Períodos mais populares",
    "separate_items_with_commas" => "Separe períodos com vírgulas",
    "add_or_remove_items" => "Adicionar ou excluir períodos",
    "choose_from_most_used" => "Escolher entre os termos mais usados dos períodos",
    "not_found" => "Nenhum período encontrado",
    "no_terms" => "Nenhum período",
    "items_list_navigation" => "Navegação na lista de períodos",
    "items_list" => "Lista de períodos",
    "back_to_items" => "Voltar para períodos",
  ];


  $args = [
    "label" => "Períodos",
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "period",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    "show_in_graphql" => false,
  ];
  register_taxonomy("period", [], $args);
}

function create_taxonomies()
{
  tx_period();
}

function create_posttypes()
{
  pt_repository();
  pt_youtube_embeds();
}

function add_features()
{
  create_taxonomies();
  create_posttypes();
}
add_action('init', 'add_features');

class new_general_setting
{
  function new_general_setting()
  {
    add_filter('admin_init', array(&$this, 'register_fields'));
  }

  function register_fields()
  {
    register_setting('general', 'link_facebook', 'esc_attr');
    register_setting('general', 'link_instagram', 'esc_attr');
    register_setting('general', 'link_youtube', 'esc_attr');
    register_setting('general', 'link_whatsapp', 'esc_attr');
    register_setting('general', 'phone_whatsapp', 'esc_attr');
    register_setting('general', 'email', 'esc_attr');
    register_setting('general', 'link_courses', 'esc_attr');

    add_settings_field('link_facebook', '<label for="link_facebook">' . __('Link do perfil no Facebook', 'link_facebook') . '</label>', array(&$this, 'field_link_facebook'), 'general');
    add_settings_field('link_instagram', '<label for="link_instagram">' . __('Link do perfil no Instagram', 'link_instagram') . '</label>', array(&$this, 'field_link_instagram'), 'general');
    add_settings_field('link_youtube', '<label for="link_youtube">' . __('Link do canal no YouTube', 'link_youtube') . '</label>', array(&$this, 'field_link_youtube'), 'general');
    add_settings_field('link_whatsapp', '<label for="link_whatsapp">' . __('Link de contato via WhatsApp', 'link_whatsapp') . '</label>', array(&$this, 'field_link_whatsapp'), 'general');
    add_settings_field('phone_whatsapp', '<label for="phone_whatsapp">' . __('Numero do WhatsApp', 'phone_whatsapp') . '</label>', array(&$this, 'field_phone_whatsapp'), 'general');
    add_settings_field('email', '<label for="email">' . __('Email de contato', 'email') . '</label>', array(&$this, 'field_email'), 'general');
    add_settings_field('link_courses', '<label for="link_courses">' . __('Link da plataforma de cursos do ILAESE', 'link_courses') . '</label>', array(&$this, 'field_link_courses'), 'general');
  }

  function field_link_facebook()
  {
    $value = get_option('link_facebook', '');
    echo '<input type="url" id="link_facebook" name="link_facebook" value="' . $value . '" />';
  }
  function field_link_instagram()
  {
    $value = get_option('link_instagram', '');
    echo '<input type="url" id="link_instagram" name="link_instagram" value="' . $value . '" />';
  }
  function field_link_youtube()
  {
    $value = get_option('link_youtube', '');
    echo '<input type="url" id="link_youtube" name="link_youtube" value="' . $value . '" />';
  }
  function field_link_whatsapp()
  {
    $value = get_option('link_whatsapp', '');
    echo '<input type="url" id="link_whatsapp" name="link_whatsapp" value="' . $value . '" />';
  }
  function field_phone_whatsapp()
  {
    $value = get_option('phone_whatsapp', '');
    echo '<input type="text" id="phone_whatsapp" name="phone_whatsapp" value="' . $value . '" />';
  }
  function field_email()
  {
    $value = get_option('email', '');
    echo '<input type="email" id="email" name="email" value="' . $value . '" />';
  }
  function field_link_courses()
  {
    $value = get_option('link_courses', '');
    echo '<input type="url" id="link_courses" name="link_courses" value="' . $value . '" />';
  }
}

$new_general_setting = new new_general_setting();
