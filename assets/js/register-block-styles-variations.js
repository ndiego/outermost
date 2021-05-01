/**
 * Register all theme block styles and unregister any Core styles that are not
 * necessary.
 */
wp.domReady( () => {

	wp.blocks.registerBlockStyle(
		'core/button',
		[
			{
				name: 'outlined-black',
				label: 'Outlined Black',
				isDefault: true,
			},
			{
				name: 'outlined-white',
				label: 'Outlined White',
			},
            {
                name: 'filled-black',
                label: 'Filled Black',
            },
            {
                name: 'filled-white',
                label: 'Filled White',
            }
		]
	);

    wp.blocks.registerBlockStyle( 'core/navigation-link', {
        name: 'navigation-button',
        label: 'Button'
    } );

    wp.blocks.registerBlockStyle( 'core/paragraph', {
        name: 'paragraph-intro',
        label: 'Intro'
    } );

    wp.blocks.registerBlockStyle( 'core/post-hierarchical-terms', {
        name: 'pill-link',
        label: 'Pill Shaped'
    } );

    wp.blocks.registerBlockStyle( 'core/post-tags', {
        name: 'pill-link',
        label: 'Pill Shaped'
    } );

    wp.blocks.registerBlockStyle( 'core/social-links', {
        name: 'social-icons-simple',
        label: 'Simple Icons'
    } );

    wp.blocks.registerBlockStyle( 'core/quote', {
        name: 'small-quote',
        label: 'Small Quote'
    } );

    wp.blocks.registerBlockStyle( 'core/list', {
        name: 'condensed-list',
        label: 'Condensed List'
    } );

    wp.blocks.unregisterBlockStyle(
        'core/button',
        [ 'default', 'outline', 'squared', 'fill' ]
    );

    wp.blocks.registerBlockVariation(
        'core/post-hierarchical-terms',
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
