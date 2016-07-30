# firstblood

Open issues:
1. Need to change WordPress one template file: wp-includes/nav-menu-template.php
// Add the menu-item-has-children class where applicable
	if ( $menu_items_with_children ) {
		foreach ( $sorted_menu_items as &$menu_item ) {
			if ( isset( $menu_items_with_children[ $menu_item->ID ] ) )
				$menu_item->classes[] = 'menu-item-has-children';
		}
	}
	
	// Add the menu-item-has-children class where applicable
	if ( $menu_items_with_children ) {
		foreach ( $sorted_menu_items as &$menu_item ) {
			if ( isset( $menu_items_with_children[ $menu_item->ID ] ) )
				$menu_item->classes[] = 'sp-has-child';
		}
	}

should modify the class name to "sp-has-child"
