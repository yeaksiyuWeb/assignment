import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Button } from 'reactstrap';

export default class Department extends Component {
    constructor(){
        super()
        this.state = {
            departments: []
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/departments').then((response) => {   
            this.setState({
                departments: response.data
            })
        })
    }

    deleteDepartment(id, name){
        if(confirm('Are you sure you want to delete ' + name + '?')){
            console.log('Confirm delete department id=', id);
            axios.delete('http://127.0.0.1:8000/api/department/' + id, {
                
            }).then((response) => {
                this.loadList()
            })
        }
    }

    componentWillMount(){
        this.loadList();
    }

    render(){
        let departments = this.state.departments.map((d) => {
            return(
                <tr>
                    <td>{d.id}</td>
                    <td>{d.department}</td>
                    <td>{d.created_at}</td>
                    <td>
                        <Button color="danger" onClick={this.deleteDepartment.bind(this, d.id, d.department)}>Delete</Button>
                    </td>
                </tr>
            );
        });

        return(
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {departments}
                    </tbody>
                </table>
            </div>
        );
    }
}

if(document.getElementById('dept-listing-table')){
    ReactDOM.render(<Department />, document.getElementById('dept-listing-table'))
}