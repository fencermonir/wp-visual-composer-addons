(function ($) {
	window.VcBigNumberView = vc.shortcode_view.extend({
		template: _.template('<div class="wpb__big__number" style="color: <%= params.number_color %>;"><%= params.number %></div>'),
		// Render method called after element is added( cloned ), and on first initialisation
		render: function () {
			window.VcBigNumberView.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event
			this.$el.find('.wpb_element_wrapper').html(this.template(this.model.toJSON()));
			return this;
		},
	});
})(window.jQuery);
