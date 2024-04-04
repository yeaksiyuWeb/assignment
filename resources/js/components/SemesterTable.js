import React, {Component} from "react";
import  ReactDOM  from "react-dom";
import axios from "axios";
import { Button } from "reactstrap";
import ConfirmationModal from "./ConfirmationModal";

export default class SemesterTable extends Component {
    constructor(){
        super()
        this.state = {
            semestersData: [],
            openConfirmModal: false,
            selectedSemester: null,
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/semesters').then((response) => {
            this.setState({
                semestersData: response.data
            })
        })
    }

    componentWillMount() {
        this.loadList();
    }

    deleteSemester(id) {
        axios.delete('http://127.0.0.1:8000/api/semester/' + id).then((response) => {
            this.loadList()
            this.setState({
                openConfirmModal: false,
                selectedSemester: null
            })
        })
    }

    toggleConfirmModal(semester) {
        this.setState((prevState)=> ({
            openConfirmModal: !prevState.openConfirmModal,
            selectedSemester: semester ? semester : null,
        }));
    }

    render() {
        const {selectedSemester} = this.state;

        let semesterTableBody = this.state.semestersData.map((semester) => {
            return(
                <tr key={semester.id}>
                    <td>{semester.id}</td>
                    <td>{semester.semester}</td>
                    <td>{semester.created_at}</td>
                    <td>
                        <Button
                            color="danger"
                            onClick={() => this.toggleConfirmModal(semester)}
                        >Delete</Button>
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
                            <th>Semester</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {semesterTableBody}
                    </tbody>
                </table>

                {selectedSemester && (
                    <ConfirmationModal 
                        message={`Are you sure you want delete semester '${selectedSemester.semester}' ?`}
                        isModalOpen={this.state.openConfirmModal}
                        toggleModal={() => this.toggleConfirmModal()}
                        handleAction={() => this.deleteSemester(selectedSemester.id)}
                    />
                )}
            </div>
        );
    }
}

if(document.getElementById('semester-table')) {
    ReactDOM.render(<SemesterTable />, document.getElementById('semester-table'))
}

