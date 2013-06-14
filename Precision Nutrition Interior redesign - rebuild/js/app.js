$(function(){
	var Product = Backbone.Model.extend();
	var ProductList = Backbone.Collection.extend({
	  model: Product,
	  url: 'data/products.json'
	});
	var ProductsView = Backbone.View.extend({
	  template: _.template($('#productlist_template').html()),
	  render: function(eventName) {
		_.each(this.model.models, function(product){
		  var lProductName = product.attributes['name'];
		  var lProductLink = product.attributes['link']
		  var lTemplate = this.template(product.toJSON());
	
		  $(this.el).append(lTemplate);
		}, this);
		return this;
	  }
	});
	var lProducts = new ProductList;
	var AppView = Backbone.View.extend({
	  el: "body",
	
	  render: function(){
		var lProductsView = new ProductsView({model:lProducts});
		var lHtml = lProductsView.render().el;
		$('#products').html(lHtml);
	  },
	
	  initialize: function(){
		var lOptions = {};
		lOptions.success = this.render;
		lProducts.fetch(lOptions);
	  }
	});
	 var App = new AppView;
});
$(function(){
	var Nutrition = Backbone.Model.extend();
	var NutritionList = Backbone.Collection.extend({
	  model: Nutrition,
	  url: 'data/nutrition.json'
	});
	var NutritionsView = Backbone.View.extend({
	  template: _.template($('#nutritionlist_template').html()),
	  render: function(eventName) {
		_.each(this.model.models, function(nutrition){
		  var lNutritionName = nutrition.attributes['name'];
		  var lNutritionLink = nutrition.attributes['link']
		  var lTemplate = this.template(nutrition.toJSON());
	
		  $(this.el).append(lTemplate);
		}, this);
		return this;
	  }
	});
	var lNutritions = new NutritionList;
	var AppView = Backbone.View.extend({
	  el: "body",
	
	  render: function(){
		var lNutritionsView = new NutritionsView({model:lNutritions});
		var lHtml = lNutritionsView.render().el;
		$('#nutrition').html(lHtml);
	  },
	
	  initialize: function(){
		var lOptions = {};
		lOptions.success = this.render;
		lNutritions.fetch(lOptions);
	  }
	});
	 var App = new AppView;
});
    $(function() {
      var schema = {
        radio:      { type: 'Radio', title: 'Are you a...', options: ['Man', 'Woman', 'Fitness Professional'] },
        name:       { type: 'Text', title: 'Name', validators: ['required'] },
		email:      { dataType: 'email', title: 'Email', validators: ['required', 'email'] },
        select:     { type: 'Select', title: 'Age Range', options: ['18 - 25', '26 - 35', '36 - 50','55+'] },
    
      };
      
      var model = new Backbone.Model({
        number: null,
        checkbox: true,
        textList: ['item1', 'item2', 'item3']
      });
	
      var form = new Backbone.Form({
		model: model,
        schema: schema,
        fieldsets: [['radio'],['name', 'email','select']]
      });
      
      window.form = form;

     $('#uiTest').hide(function() {
		 	$('#uiTest #formContainer').html(form.render().el);
			$('#uiTest #formContainer input:radio:eq(0)').attr('checked',true);
			$('#uiTest #formContainer fieldset').eq(0).show(function() {
				$('#uiTest').fadeIn('fast');
			});
	 	});
	$('#uiTest #next-button').click(function() {
		$(this).hide();
		$('#uiTest #formContainer fieldset:eq(0)').fadeOut('fast', function() {
			$('#uiTest #submit-button').show();
			$('#uiTest #formContainer fieldset:eq(1)').fadeIn('fast');
		});
	});
      $('#uiTest label').click(function() {
        var name = $(this).attr('for'),
            $editor = $('#' + name),
            key = $editor.attr('name');

        console.log(form.getValue(key))
      });
  $('#uiTest #submit-button').click(function() {
	    form.validate();
	if ( form.validate()){
			return false;
	}
		var type = $("input[name='c1_radio']").val();  
		var name = $("input[name='name']").val();  
		var email = $("input[name='email']").val();  
		var age = $("input[name='age']").val();  
		
		var dataString = 'type=' + type +  '&name='+ name + '&email=' + email + '&age=' + age;
		
		$.ajax({
      type: "POST",
      url: "http://respondto.it/pn_frontend_test",
      data: dataString,
      success: function() {
		$('#error-message').html('<div class="alert alert-success">Your request has been submitted successfully!</div>');
      },
	  error: function(XMLHttpRequest, textStatus, errorThrown) { 
		$('#error-message').html('<div class="alert alert-error">There was a problem with your submission. Status: ' + textStatus + 'Error: ' + errorThrown +'</div>');
    }
     });
	 
    return false;
	});
    });
