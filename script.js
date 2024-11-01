(function() {
  tinymce.PluginManager.add('shortcode_wp_ionicons_insert_zb', function( editor, url ) {

  	editor.addButton( 'shortcode_wp_ionicons_insert_zb', {
			text: 'WP Ionicons',
	    type: 'menubutton',
	    tooltip: 'Add WP Ionicons Shortcodes',
	    menu: [
	    	{
          text: 'Outline Icons',
          //icon: 'icon dashicons-lightbulb',
          value: '[wpion icon="chatbox-ellipses-outline"]',
          onclick: function(e) {
            e.stopPropagation();
            editor.insertContent(this.value());
          }       
     		},
     		{
          text: 'Filed Icons',
         // icon: 'icon dashicons-forms',
          value: '[wpion icon="chatbox-ellipses"]',
          onclick: function(e) {
            e.stopPropagation();
            editor.insertContent(this.value());
          }       
     		},
     		{
          text: 'Sharp Icons',
         // icon: 'icon dashicons-wordpress',
          value: '[wpion icon="chatbox-ellipses-sharp"]',
          onclick: function(e) {
            e.stopPropagation();
            editor.insertContent(this.value());
          }       
     		},
     		{
          text: 'Color Icons',
          icon: 'icon dashicons-art',
          value: '[wpion icon="logo-ionic" color="#3880ff"]',
          onclick: function(e) {
            e.stopPropagation();
            editor.insertContent(this.value());
          }       
     		},
     		{
          text: 'Sizes (1x to 10x)',
          icon: 'icon dashicons-editor-expand',
          menu: [
            {
              text: '2x',
              value: '[wpion icon="logo-ionic" size="2x"]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }       
            },
            {
              text: '3x',
              value: '[wpion icon="logo-ionic" size="3x"]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }       
            },
            {
              text: '4x',
              value: '[wpion icon="logo-ionic" size="4x"]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }       
            },
            {
              text: '5x',
              value: '[wpion icon="logo-ionic" size="5x"]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }       
            },
            {
              text: '7x',
              value: '[wpion icon="logo-ionic" size="7x"]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }       
            },
            {
              text: '10x',
              value: '[wpion icon="logo-ionic" size="10x"]',
              onclick: function(e) {
                e.stopPropagation();
                editor.insertContent(this.value());
              }       
            },
          ]
        },
      ]
  	});

  });
})();