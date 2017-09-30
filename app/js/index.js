import React from 'react';
import {render} from 'react-dom';
import "./header";
import{View} from "./view";
import{Text} from "./text";
import  Style from "./style.css";


class App extends React.Component {
	constructor(props, context) {
		super(props, context);
		this.state = {
			content: [1, 2, 3, 4, 5, 6]
		};
	}

	componentDidMount() {

	}

	set() {

	}

	render() {

		return (
			<View style={{height: 50, backgroundColor: 'blue'}} onClick={this.set.bind(this)}>
				<View if={true} className={Style['color']}>
					<Text>ss</Text>
					<Text>ss</Text>
				</View>
			</View>
		);
	}
}
render(<App/>, document.getElementById("app"))