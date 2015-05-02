var icons = {
  "其他": "list-alt",
  "學會公告": "star",
  "學術演講訊息": "blackboard",
  "徵才啟事": "user",
  "研討會訊息": "book",
  "論文徵稿訊息": "pencil"
}

var NewsBoard = React.createClass({displayName: "NewsBoard",
  loadCommentsFromServer: function () {
    jQuery.ajax({
      url: this.props.url,
      data: {
        action: "get_data"
      },
      dataType: 'json',
      success: function(data) {
        this.setState({data: data});
        console.log(data);
      }.bind(this),
      error: function(xhr, status, err) {}
    });
  },
  getInitialState: function(){
    return {data:{}};
  },
  componentDidMount: function(){
    this.loadCommentsFromServer();
  },
  render: function() {
    var boxs = [];
    var data = this.state.data;
    for(var c in data) {
      boxs.push( ( React.createElement(NewsBox, {content: data[c].posts, category: c, url: data[c].url, icon: icons[c]}) ) );
    }
    return (
      React.createElement("div", {className: "news-board"}, 
        boxs
      )
    );
  }
});

var NewsBox = React.createClass({displayName: "NewsBox",
  render: function() {
    return (
      React.createElement("div", {className: "news-box col-xs-12 col-sm-6 col-lg-4"}, 
        React.createElement("div", {className: "category-title"}, 
          React.createElement("a", {href: this.props.url}, 
            React.createElement("span", {className: "glyphicon glyphicon-" + this.props.icon, "aria-hidden": "true"}), 
            React.createElement("h1", null, this.props.category)
          )
        ), 
        React.createElement(NewsList, {content: this.props.content})
      )
    );
  }
});

var NewsList = React.createClass({displayName: "NewsList",
  render: function() {

    var newsNodes = this.props.content.map(function (news) {
      return (
        React.createElement(News, {title: news.post_title, url: news.guid}, 
          news.post_content
        )
      );
    });
    return (
      React.createElement("div", {className: "news-list"}, 
        newsNodes
      )
    );
  }
});

var News = React.createClass({displayName: "News",
  render: function() {
    return (
      React.createElement("div", {className: "news"}, 
        React.createElement("h2", {className: "news-title"}, 
          React.createElement("a", {href: this.props.url}, this.props.title)
        ), 
        this.props.children
      )
    );
  }
});

React.render(
  React.createElement(NewsBoard, {url: "/wp-admin/admin-ajax.php"}),
  document.getElementById('news-board-wrapper')
);


