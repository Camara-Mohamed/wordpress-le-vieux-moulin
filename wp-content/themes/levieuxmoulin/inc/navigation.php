<?php

// Enregistrement des menus
register_nav_menus([
    'header' => __('Menu principal', 'levm'),
    'footer' => __('Menu de pied de page', 'levm'),
]);

function levm_get_navigation_links(string $location): array
{
    $locations = get_nav_menu_locations();
    if (!isset($locations[$location])) {
        return [];
    }

    $menu_items = wp_get_nav_menu_items($locations[$location]);
    if (empty($menu_items)) {
        return [];
    }

    $links = [];
    $current_object_id = get_queried_object_id();

    foreach ($menu_items as $item) {
        if ($item->menu_item_parent != 0) {
            continue;
        }

        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;
        $link->current = ($item->object_id == $current_object_id);
        $link->children = [];

        $links[$item->ID] = $link;
    }

    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == 0 || !isset($links[$item->menu_item_parent])) {
            continue;
        }

        $child = new stdClass();
        $child->href = $item->url;
        $child->label = $item->title;
        $child->current = ($item->object_id == $current_object_id);

        $links[$item->menu_item_parent]->children[] = $child;
    }

    return array_values($links);
}
