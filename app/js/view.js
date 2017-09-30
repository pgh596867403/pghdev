import React, {Component} from 'react';

export class View extends Component {
    constructor(props) {
        super(props);
        this.state = {
            liked: false
        };
    }

    render() {
        if (this.props.if) {
            if (this.props.for) {
                this.props.for.map((item, key) => {

                })
                return (
                    <div>
                        this.props.for.map((item,key)=>{
                        <div>{item}</div>
                    })
                    </div>
                );
            }

        } else {
            return null
        }


    }
}