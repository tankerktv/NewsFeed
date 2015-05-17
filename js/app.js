var news = [];
var phparray;
var oReq = new XMLHttpRequest();
var x = String();
var y;

	function closeallwindows(from){
		if (from == 'index') { //эта проверка позволяет избавиться от ошибки во время попытки закрытия addingform, которой в подробной новости нет
			document.getElementById('wrap').style.display = 'none';
			document.getElementById('editingform').style.display = 'none';
			document.getElementById('addingform').style.display = 'none';
			} else {
			document.getElementById('wrap').style.display = 'none';
			document.getElementById('editingform').style.display = 'none';
			}
		}
	
	function showaddingform(){
		document.getElementById('addingform').style.display = 'block';
		document.getElementById('wrap').style.display = 'block';
		}
		
	function showeditingform(idr, from){
		document.getElementById('editingform').style.display = 'block';
		document.getElementById('wrap').style.display = 'block';
		getdata(idr, from);
		}
	
	function getdata(idr, from) {
		if (from == 'index') {
		  	document.getElementById("NewsTemplate").style.visibility = "hidden";
			var nArray = getNewsById(idr);
			document.forms[1].Heading.value = nArray[0].heading;
			document.forms[1].Content.value = nArray[0].fullContent;
			document.forms[1].User.value = nArray[0].user;
			document.forms[1].ID.value = nArray[0].idr;
		} else {
			heading=document.getElementById("heading").innerHTML
			content=document.getElementById("content").innerHTML;
			user=document.getElementById("user").innerHTML;
			document.forms[0].Heading.value = heading;
			document.forms[0].Content.value = content;
			document.forms[0].User.value = user;
			document.forms[0].ID.value = idr;
		}
		}

	function adding() {
		var Heading = document.forms[0].Heading.value
		var Content = document.forms[0].Content.value
		var User = document.forms[0].User.value
		$.post("adding.php", { Heading, Content, User });
		location.reload();
		}

	function editing(formnumber) {
		var Heading = document.forms[formnumber].Heading.value
		var Content = document.forms[formnumber].Content.value
		var User = document.forms[formnumber].User.value
		var ID = document.forms[formnumber].ID.value
		$.post("editing.php", { Heading, Content, User, ID });
		location.reload();
		}

	function deleting(idr) {
		var newvar = idr;
		console.log(newvar);
		$.post("deleting.php", { newvar });
		document.location.href = "/";
		}

(function ($) {

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

    var News = Backbone.Model.extend({
    });

    var Directory = Backbone.Collection.extend({
        model: News
    });

    var NewsView = Backbone.View.extend({
        template: $("#NewsTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

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
      if ((s[i] != undefined)&&(s[i+1] != null)) {
        var cart = [];
        var contentToCut = cut(s[i+5].toString());
          console.log(s[i+1]);
        cart = { idr: s[i+1], date: s[i+2], user: s[i+3], heading: s[i+4], content: contentToCut, fullContent: s[i+5]};
        news.push(cart);
      } else {break;}
    }
    var directory = new DirectoryView();
  }

    function cut(x){
        var s = "";
        for (var i = 0; i < 160; i++){
            if (x[i] == undefined) {break;}
            if ((i > 140) && (x[i]) == " "){
                i = 160;
                break;
            }
            s = s + x[i];
        }
        if (i == 160){
            s = s + "...";
        }
        return s;
    }
} (jQuery));

function getNewsById(y){
    var result = $.grep(news, function(e){ return e.idr == y; });
    console.log("app"+result);
    return result;
}


