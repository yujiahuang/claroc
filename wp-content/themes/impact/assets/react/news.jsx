var icons = {
  "其他公告": "list-alt",
  "學會公告": "star",
  "學術演講訊息": "blackboard",
  "徵才啟事": "user",
  "研討會訊息": "book",
  "論文徵稿訊息": "pencil"
}

var NewsBoard = React.createClass({
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
      boxs.push( ( <NewsBox content={data[c].posts} category={c} url={data[c].url} icon={icons[c]}></NewsBox> ) );
    }
    return (
      <div className="news-board">
        {boxs}
      </div>
    );
  }
});

var NewsBox = React.createClass({
  render: function() {
    return (
      <div className="news-box col-xs-12 col-sm-6 col-lg-4">
        <div className="category-title">
          <a href={this.props.url}>
            <span className={"glyphicon glyphicon-" + this.props.icon} aria-hidden="true"></span>
            <h1>{this.props.category}</h1>
          </a>
        </div>
        <NewsList content={this.props.content} />
      </div>
    );
  }
});

var NewsList = React.createClass({
  render: function() {

    var newsNodes = this.props.content.map(function (news) {
      return (
        <News title={news.post_title} url={news.guid}>
        </News>          

      );
    });
    return (
      <div className="news-list">
        {newsNodes}
      </div>
    );
  }
});

var News = React.createClass({
  render: function() {
    return (
      <div className="news">
        <h2 className="news-title">
          <a href={this.props.url}>{this.props.title}</a>
        </h2>
      </div>
    );
  }
});

React.render(
  <NewsBoard url="/wp-admin/admin-ajax.php" />,
  document.getElementById('news-board-wrapper')
);


