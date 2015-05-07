(function ($) {

    var news = [];
    var phparray;
    var oReq = new XMLHttpRequest();

    //request part
  oReq.onload = function() {
    };
    oReq.open("get", "get-data.php", true);
    oReq.onreadystatechange=function() {
    if (oReq.readyState==4) {
    if (oReq.status == 200) {
      phparray = this.responseText;
      parser();
    }}}
    oReq.send();

    //define product model
    var News = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var Directory = Backbone.Collection.extend({
        model: News
    });

    //define individual contact view
    var NewsView = Backbone.View.extend({
        template: $("#NewsTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var DirectoryView = Backbone.View.extend({
        el: $("#news"),

        initialize: function () {
            this.collection = new Directory(news);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderNews(item);
            }, this);
        },

        renderNews: function (item) {
            var newsView = new NewsView({
                model: item
            });
            this.$el.append(newsView.render().el);
        }
    });


  function parser() {
    var s = JSON.parse(phparray);
    for (var i = 0; i < s.length; i = i + 6) {
      console.log(i);
      if ((s[i] != undefined)&&(s[i+1] != null)) {
        var cart = [];
        cart = { idr: s[i+1], date: s[i+2], user: s[i+3], heading: s[i+4], content: s[i+5]};
        news.push(cart);
      } else {break;}
    }
    var directory = new DirectoryView();
  }

} (jQuery));


