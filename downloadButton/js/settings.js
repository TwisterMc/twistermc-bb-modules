/*globals jQuery, FLBuilder */
(function( $ ) { // jshint ignore:line

	/**
	 * Use this file to register a module helper that adds additional logic to the settings form.
	 * The method 'FLBuilder._registerModuleHelper' accepts two parameters,
	 * the module slug (same as the MODULE FILE name) and
	 * an object containing the helper methods and properties.
	 */
	FLBuilder._registerModuleHelper( 'class-download-button', {

		/**
		 * The 'rules' property is where you setup validation rules that are passed to the jQuery validate plugin.
		 *
		 * @link http://jqueryvalidation.org
		 *
		 * @property rules
		 * @type object
		 */
		rules: {
			pdf_url: {
				required: true,
			},
		},
	} );

})( jQuery );
