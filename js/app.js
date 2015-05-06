(function ($) {
    //demo data

	var news = [];

/*
var info = ["",
["1","2015-04-10","highvoltage","One thing has happened","Today something has happened somwhere who gives a fuck?","link"],
["2","2015-04-16","highvoltage","Another thing has happened","This time of day nobody gives a shit.","link"],
["3","2015-04-27","grigo","Guess what's up","Fuck you. That's what's up.","link"],
["4","2015-04-09","poro","Something happened","Yesterday there was... but that doesn't matter.","link"],
["5","2015-04-03","highvoltage","Really important shit here.","Nah. Not gonna tell you. ",null]]; */


  //special func to replace all instances of a character
  String.prototype.replaceAll = function(str1, str2, ignore)
  {
    return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
  }

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

    //create instance of master view


  var i = 0;
  var j = 0;
  var n = 10;
  var s;
  var j = 6;
  function parser() {
    console.log("What should be parsed:");
    console.log(phparray);
    var s = JSON.parse(phparray);
    console.log(s);
    /*s = phparray.split("[");
     s = s.toString();
     s = s.split("]");
     s = s.toString();
     s = s.split(",");
     console.log(s);
     for (i = 0; i < s.length; i++){
     var ort = s[i].toString();
     s[i] = ort.replaceAll("\"", "");}*/
    console.log(s.length);
    for (i = 0; i < s.length; i = i + 6) {
      console.log(i);
      if ((s[i] != undefined)&&(s[i+1]!=null)) {
        console.log(s[i + 2]);
        console.log(s[i + 3]);
        console.log(s[i + 4]);
        console.log(s[i + 5]);
        var cart = [];
        cart = { idr: s[i+1], date: s[i+2], user: s[i+3], heading: s[i+4], content: s[i+5]};
        //cart = {address: s[i + 2], email: s[i + 3], name: s[i + 4], tel: s[i + 5], type: "s"};
        news.push(cart);
      } else {break;}
    }

    console.log("What came out of it:");
    console.log(news);
    var directory = new DirectoryView();
  }

		  $('#addnews').on('click', function (e) {
			   news = [];
			   Directory = new DirectoryView;
			  //code here
		  })

} (jQuery));


