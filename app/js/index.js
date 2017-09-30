var React = require('react');
var ReactDOM = require('react-dom');
var Header = require('./header')
class LikeButton extends React.Component {
	constructor() {
		super();
		this.state = {
			liked: false
		};

		this.handleClick = this.handleClick.bind(this);
	}

	handleClick() {
		this.setState({liked: !this.state.liked});
	}

	render() {
		const text = this.state.liked ? 'liked' : 'haven\'t liked';
		return (
			<div>
				<Header/>
				<div onClick={this.handleClick} >You {text}
					this. Click to toggle.
				</div>
			</div>
		);
	}
}
ReactDOM.render(<LikeButton />, document.getElementById('app'));