var React = require('react');
export default  class Header extends React.Component {
	constructor() {
		super();
		this.state = {
			liked: false
		};
	}

	render() {

		return (
			<div onClick={this.handleClick} style={{height: 50, backgoryColor: 'blue'}}>

			</div>
		);
	}
}