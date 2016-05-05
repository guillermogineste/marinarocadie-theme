# Marina Roca Die - Wordpress Theme

### Npm use:
To run in _dev-mode_ using MAMP:

1. Install LiveReload Extension
2. To build and watch `npm run start`
3. Browse localhost

To build only:
`npm run build`


### Plugins required
- Custom Field Suite
- Custom Post Type UI

### Create custom Post type
Import:
```
{"projects":{"name":"projects","label":"Projects","singular_label":"Project","description":"","public":"true","show_ui":"true","show_in_nav_menus":"true","show_in_rest":"false","rest_base":"","has_archive":"false","has_archive_string":"","exclude_from_search":"false","capability_type":"post","hierarchical":"false","rewrite":"true","rewrite_slug":"","rewrite_withfront":"true","query_var":"true","query_var_slug":"","menu_position":"6","show_in_menu":"true","show_in_menu_string":"","menu_icon":"","supports":["title","editor"],"taxonomies":["category"],"labels":{"menu_name":"Projects","all_items":"All Projects","add_new":"Add New","add_new_item":"Add New Project","edit_item":"Edit Project","new_item":"New Project","view_item":"View Project","search_items":"Search Project","not_found":"No Projects Found","not_found_in_trash":"No Projects Found in Trash","parent":"Parent Project","featured_image":"","set_featured_image":"","remove_featured_image":"","use_featured_image":"","archives":"","insert_into_item":"","uploaded_to_this_item":"","filter_items_list":"","items_list_navigation":"","items_list":""},"custom_supports":""}}
```

###Create Fields Group

Import:
```
[{"post_title":"Homepage image","post_name":"homepage-image","cfs_fields":[{"id":9,"name":"homepage_image","label":"Homepage Image","type":"file","notes":"","parent_id":0,"weight":0,"options":{"return_value":"url","required":"0"}}],"cfs_rules":{"post_ids":{"operator":"==","values":["9"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]
```
```
[{"post_title":"Works in project","post_name":"add-work","cfs_fields":[{"id":"6","name":"works","label":"Works","type":"loop","notes":"","parent_id":0,"weight":0,"options":{"row_display":"0","row_label":"Work","button_label":"Add Work","limit_min":"","limit_max":""}},{"id":"1","name":"image","label":"Image","type":"file","notes":"","parent_id":6,"weight":1,"options":{"return_value":"url","required":"0"}},{"id":"2","name":"title","label":"Title","type":"text","notes":"","parent_id":6,"weight":2,"options":{"default_value":"","required":"0"}},{"id":"3","name":"technique","label":"Technique","type":"text","notes":"","parent_id":6,"weight":3,"options":{"default_value":"","required":"0"}},{"id":7,"name":"width","label":"Width","type":"text","notes":"","parent_id":6,"weight":4,"options":{"default_value":"","required":"0"}},{"id":8,"name":"height","label":"Height","type":"text","notes":"","parent_id":6,"weight":5,"options":{"default_value":"","required":"0"}},{"id":"5","name":"year","label":"Year","type":"text","notes":"","parent_id":6,"weight":6,"options":{"default_value":"","required":"0"}}],"cfs_rules":{"post_types":{"operator":"==","values":["projects"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]
```
```
[{"post_title":"Social","post_name":"social","cfs_fields":[{"id":"10","name":"social-image","label":"Image","type":"file","notes":"","parent_id":0,"weight":0,"options":{"return_value":"url","required":"0"}},{"id":"11","name":"social-title","label":"Title","type":"text","notes":"","parent_id":0,"weight":1,"options":{"default_value":"","required":"0"}},{"id":"12","name":"social-description","label":"Description","type":"text","notes":"","parent_id":0,"weight":2,"options":{"default_value":"","required":"0"}}],"cfs_rules":{"post_types":{"operator":"==","values":["page","projects"]}},"cfs_extras":{"order":"0","context":"normal","hide_editor":"0"}}]
```
### Header Menu
Menu items order:

1. Categories (ordered by the number on their description)
2. Pages (ordered with the order field on each page)

All pages will be listed except the one used as **Front Page**

###Licence
GNU General Public License v3.0
