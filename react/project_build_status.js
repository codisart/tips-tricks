'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

function Status(_ref) {
  var bgColor = _ref.bgColor;

  var divStyle = {
    backgroundColor: bgColor,
    width: 250,
    height: 250
  };

  return React.createElement(
    "div",
    { style: divStyle },
    "\"label\""
  );
}

var ProjectBuildStatus = function (_React$Component) {
  _inherits(ProjectBuildStatus, _React$Component);

  function ProjectBuildStatus(props) {
    _classCallCheck(this, ProjectBuildStatus);

    var _this = _possibleConstructorReturn(this, (ProjectBuildStatus.__proto__ || Object.getPrototypeOf(ProjectBuildStatus)).call(this, props));

    _this.state = { successful_build: false };
    return _this;
  }

  _createClass(ProjectBuildStatus, [{
    key: "render",
    value: function render() {
      if (this.state.successful_build) {
        return React.createElement(Status, { label: "Failed", bgColor: "red" });
      }

      return React.createElement(Status, { label: "Success", bgColor: "green" });
    }
  }, {
    key: "toggle",
    value: function toggle() {
      var that = this;

      axios.get('https://www.random.org/integers/?num=1&min=0&max=1&col=1&base=10&format=plain&rnd=new').then(function (response) {
        that.setState({ successful_build: response.data === 1 });
      });
    }
  }, {
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this2 = this;

      this.interval = setInterval(function () {
        return _this2.toggle();
      }, 5000);
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      clearInterval(this.interval);
    }
  }]);

  return ProjectBuildStatus;
}(React.Component);

var domContainers = document.querySelectorAll('.like_button_container');

domContainers.forEach(function (domContainer) {
  ReactDOM.render(React.createElement(ProjectBuildStatus, { myProps: domContainer.getAttribute('data') }), domContainer);
});

var MyElement = function (_HTMLElement) {
  _inherits(MyElement, _HTMLElement);

  function MyElement() {
    _classCallCheck(this, MyElement);

    return _possibleConstructorReturn(this, (MyElement.__proto__ || Object.getPrototypeOf(MyElement)).apply(this, arguments));
  }

  _createClass(MyElement, [{
    key: "connectedCallback",
    value: function connectedCallback() {
      ReadDOM.render(React.createElement(ProjectBuildStatus, null), this);
    }
  }]);

  return MyElement;
}(HTMLElement);

customElements.define('project-status', MyElement);