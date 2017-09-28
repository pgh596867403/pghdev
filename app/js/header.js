import React,{Component} from 'react'
import {render} from 'react-dom'
export  class Header extends Component {
    constructor() {
        super();
        this.state = {
            liked: false
        };
    }

    render() {

        return (
            <div  style={{height: 50, backgroundColor: 'blue'}}>
              sdfsdfdsf
            </div>
        );
    }
}
export  class Footer extends React.Component {
    constructor() {
        super();
        this.state = {
            liked: false
        };
    }

    render() {

        return (
            <div  style={{height: 50, backgroundColor: 'blue'}}>
                {this.props.children}
            </div>
        );
    }
}
