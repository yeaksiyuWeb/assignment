import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Button } from 'reactstrap';
import ConfirmationModal from "./ConfirmationModal";

export default class DepartmentTable extends Component {
    constructor(){
        super()
        this.state = {
            departments: [],
            openConfirmModal: false,
            selectedDepartment: null,
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/departments').then((response) => {   
            this.setState({
                departments: response.data
            })
        })
    }

    deleteDepartment(id){
        axios.delete('http://127.0.0.1:8000/api/department/' + id, {
            
        }).then((response) => {
            this.loadList()
            this.setState((prevState) => ({
                openConfirmModal: !prevState.openConfirmModal,
            }));
        })
        // if(confirm('Are you sure you want to delete ' + name + '?')){
        //     console.log('Confirm delete department id=', id);
            
        // }
    }

    componentWillMount(){
        this.loadList();
    }

    toggleConfirmModal(department) {
        this.setState((prevState) => ({
            openConfirmModal: !prevState.openConfirmModal,
            selectedDepartment: department
        }));
    }

    render(){
        const {selectedDepartment} = this.state;

        let departments = this.state.departments.map((department) => {
            return(
                <tr>
                    <td>{department.id}</td>
                    <td>{department.department}</td>
                    <td>{department.created_at}</td>
                    <td>
                        <Button color="danger" onClick={() => this.toggleConfirmModal(department)}> Delete </Button>
                        {/* <Button color="danger" onClick={this.deleteDepartment.bind(this, department.id, department.department)}>Delete</Button> */}
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

                {selectedDepartment && (
                    <ConfirmationModal 
                        message={`Are you sure you want delete '${selectedDepartment.department}'?`}
                        isModalOpen={this.state.openConfirmModal}
                        toggleModal={() => this.toggleConfirmModal()}
                        handleAction={() => this.deleteDepartment(selectedDepartment.id)}
                    />
                )}

            </div>
        );
    }
}

if(document.getElementById('dept-listing-table')){
    ReactDOM.render(<DepartmentTable />, document.getElementById('dept-listing-table'))
}