var FormView = Backbone.View.extend({
  tagName: 'form',

  label: function(name) {
    return this.make('label', {for: name}, name);
  },

  textField: function(name) {
    var el = this.make('input', {type: "text", name: name, value: this.model.get(name)});
    this.bindElementToAttribute(el, name);
    return el;
  }, 

  textArea: function(name) {
    var el = this.make('textarea', {name: name, value: this.model.get(name)});
    this.bindElementToAttribute(el, name);
    return el;
  },

  select: function(name, options) {
    var select = this.make('select', {name: name});
    var view = this;
    var model = this.model;
    _.each(options, function(option) {
      if (option instanceof Array) {
        option_name = option[0];
        option_value = option[1];
      } else {
        option_name = option_value = option;
      }
      var attr = {value: option_value};
      if (model.get(name) == option_value) {
        attr.selected = true;
      }
      $(select).append(view.make('option', attr, option_name));
    });
    this.bindElementToAttribute(select, name);
    return select;
  },

  checkBox: function(name) {
    var attr = {type: "checkbox", name: name, value: 1};
    if (this.model.get(name)) {
      attr.checked = "checked";
    }
    var el = this.make('input', attr);
    this.bindElementToAttribute(el, name);
    return el;
  },

  submit: function() {
    var el = this.make('input', {id: "submit", type: "button", value: "Save"});
    var model = this.model;
    $(el).bind("click", function() {model.save()});
    return el;
  },

  destroy: function() {
    var el = this.make('input', {id: "submit", type: "button", value: "Delete"});
    var model = this.model;
    $(el).bind("click", function() {model.destroy()});
    return el;
  },

  bindElementToAttribute: function(el, name) {
    var model = this.model;
    $(el).bind("change", function() {model.attributes[name] = $(el).val()});
  },
});
