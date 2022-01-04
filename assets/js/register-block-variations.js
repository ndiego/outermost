/**
 * Register all theme block variations.
 */
wp.domReady( () => {
    wp.blocks.registerBlockVariation(
        'core/post-terms',
        {
            name: 'knowledge-base-category',
    		title: 'Article Categories',
    		icon: 'category',
    		isDefault: false,
    		attributes: { term: 'knowledge-base-category' },
        },
    );

    wp.blocks.registerBlockVariation(
        'core/navigation-link',
        {
            name: 'knowledge-base-category-link',
            icon: 'category',
            title: 'Article Category Link',
            description: 'A link to an article category',
            attributes: { type: 'knowledge-base-category', kind: 'taxonomy' },
        },
    );
} );
