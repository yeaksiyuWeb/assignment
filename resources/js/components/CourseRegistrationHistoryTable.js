import React, {Component} from "react";
import ReactDOM from "react-dom"
import axios from "axios";
import { Button } from "reactstrap";

export default class StudRegistrationHistoryTable extends Component {
    constructor(){
        super()
        this.state = {
            registrationHistoryData: [],
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/registration-history').then((response) => {
            this.setState({
                registrationHistoryData: response.data
            })
        })
    }

    componentWillMount() {
        this.loadList();
    }

    render(){
        let registrationHistoryTableBody = this.state.registrationHistoryData.map((history) => {
            return(
                <tr key={history.id}>
                    <td>{history.id}</td>
                    <td>{history.joinStudentTable}</td>
                </tr>
            );
        })
    }
}