import React, {Component} from 'react';

export class View extends Component {
	constructor(props) {
		super(props);
		this.state = {};
		console.log(this.props.children)
		console.log(this.props.style)
	}

	render() {
		if (typeof(this.props.if) == 'undefined') {
			return (
				<div style={this.props.style}>
					{this.props.children}
				</div>
			);
		} else if (this.props.if) {
			return (
				<div style={this.props.style}>
					{this.props.children}
				</div>
			);
		} else {
			return null;
		}


	}
}