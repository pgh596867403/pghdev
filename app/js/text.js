import React, {Component} from 'react';

export class Text extends Component {
	constructor(props) {
		super(props);
		this.state = {

		};
	}
	render() {
		if (typeof(this.props.if) == 'undefined') {
			return (
				<span>
					{this.props.children}
				</span>
			);
		} else if (this.props.if) {
			return (
				<span>
					{this.props.children}
				</span>
			);
		} else {
			return null;
		}


	}
}