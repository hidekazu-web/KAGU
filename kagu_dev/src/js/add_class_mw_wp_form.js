function add_class_mw_wp_form() {
  jQuery('.mw_wp_form').addClass('p-byMailSection__form');
  jQuery('.mw_wp_form form').addClass('p-form').attr('id', 'js-form');
}

export {add_class_mw_wp_form};
