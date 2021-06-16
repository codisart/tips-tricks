'use strict';

interface Patate {
  label: string,
  bgColor: int
}

function Status({ label, bgColor }: Patate) {
  const divStyle = {
    backgroundColor: bgColor,
    width: 250,
    height: 250,
  };

  return (
    <div style={divStyle}>{label}</div>
  );
}

class ProjectBuildStatus extends React.Component {
  constructor(props) {
    super(props);
    this.state = { successful_build: false };
  }

  render() {
    if (this.state.successful_build) {
      return <Status label="Failed" bgColor="red" />;
    }

    return <Status label="Success" bgColor="green" />;
  }

  toggle() {
    let that = this;

    axios.get('https://www.random.org/integers/?num=1&min=0&max=1&col=1&base=10&format=plain&rnd=new')
      .then(function(response) {
        that.setState({ successful_build: (response.data === 1)});
      }
    )
  }

  componentDidMount() {
    this.interval = setInterval(() => this.toggle(), 5000);
  }
  componentWillUnmount() {
    clearInterval(this.interval);
  }
}

let domContainers = document.querySelectorAll('.like_button_container');

domContainers.forEach(domContainer => {
    ReactDOM.render(<ProjectBuildStatus myProps={domContainer.getAttribute('data')} />, domContainer);
});

class MyElement extends HTMLElement {
  connectedCallback() {
    ReadDOM.render(<ProjectBuildStatus />, this);
  }
}

customElements.define('project-status', MyElement);
