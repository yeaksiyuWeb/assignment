import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Button, FormGroup, Modal, ModalBody, ModalHeader, Label, Input, ModalFooter} from "reactstrap";
import ConfirmationModal from "./ConfirmationModal";

export default class ManageStudentTable extends Component {
    constructor(){
        super()
        this.state = {
            students: [],
            openConfirmModal: false,
            openFormModal: false,
            updateStudentData: {
                id:"",
                studentName:"", 
                pincode:"", 
                session:"", 
                department:"",
                semester:"",
                cgpa:""
            },
            selectedStudent: null,
            openPasswordModal: false
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/students').then((response) => {   
            this.setState({
                students: response.data
            })
        })
    }

    deleteStudent(id){
        axios.delete('http://127.0.0.1:8000/api/student/' + id, {
            
        }).then((response) => {
            this.loadList()
            this.setState((prevState) => ({
                openConfirmModal: !prevState.openConfirmModal,
            }));
        })
    }

    callUpdateStudent(student){
        this.setState({
            selectedStudent: student,
            updateStudentData: {
                id: student.id,
                studentName: student.studentName, 
                pincode: student.pincode, 
                session: student.session, 
                department: student.department,
                semester: student.semester,
                cgpa: student.cgpa
            },
            openFormModal: !this.state.openConfirmModal
        })
    }

    updateStudent() {
        let {id, studentName, pincode, session, department, semester, cgpa} = this.state.updateStudentData;
        axios.put('http://127.0.0.1:8000/api/student/' + this.state.updateStudentData.id, {
            studentName, 
            pincode, 
            session, 
            department, 
            semester, 
            cgpa
        }).then((response) => {
            this.loadList()
            this.setState({
                openFormModal: false,
                updateStudentData: {
                    id:"",
                    studentName:"", 
                    pincode:"", 
                    session:"", 
                    department:"",
                    semester:"",
                    cgpa:""
                }
            })
            alert(`Student ${id} is updated`)
        })
    }

    componentWillMount(){
        this.loadList();
    }

    toggleConfirmModal(student) {
        this.setState((prevState) => ({
            openConfirmModal: !prevState.openConfirmModal,
            selectedStudent: student
        }));
    }

    toggleFormModal() {
        this.setState((prevState) => ({
            openFormModal: !prevState.openFormModal,
        }));
    }

    resetPassword(){

    }

    togglePasswordModal(){

    }

    render(){
        const {selectedStudent} = this.state;

        let students = this.state.students.map((student) => {
            return(
                <tr>
                    <td>{student.id}</td>
                    <td>{student.regNo}</td>
                    <td>{student.studentName}</td>
                    <td>{student.pincode}</td>
                    <td>{student.created_at}</td>
                    <td>
                        <Button 
                            style={{marginRight: 10}}
                            color="primary" 
                            onClick={
                                this.callUpdateStudent.bind(this, student)
                            }
                        >Edit</Button>
                        <Button 
                            style={{marginRight: 10}}
                            color="danger"
                            onClick={
                                () => this.toggleConfirmModal(student)
                            }
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
                            <th>Reg No </th>
                            <th>Student Name </th>
                            <th>Pincode</th>
                            <th>Reg Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {students}
                    </tbody>
                </table>

                {selectedStudent && (
                    <ConfirmationModal 
                        message={`Are you sure you want delete '${selectedStudent.regNo} ${selectedStudent.studentName}'?`}
                        isModalOpen={this.state.openConfirmModal}
                        toggleModal={() => this.toggleConfirmModal()}
                        handleAction={() => this.deleteStudent(selectedStudent.id)}
                    />
                )}

                <Modal isOpen={this.state.openFormModal} toggle={this.toggleFormModal.bind(this)} centered>
                    <ModalHeader toggle={this.toggleFormModal.bind(this)}> Update Student</ModalHeader>
                    <ModalBody>
                        <FormGroup>
                            <Label for='studentName'>Student Name</Label>
                            <Input 
                                id="studentName"
                                value={this.state.updateStudentData.studentName}
                                onChange={(data) => {
                                    let{ updateStudentData: newStudentData } = this.state
                                    newStudentData.studentName = data.target.value
                                    this.setState({newStudentData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='pincode'>Pincode</Label>
                            <Input 
                                id="pincode"
                                value={this.state.updateStudentData.pincode}
                                onChange={(data) => {
                                    let{ updateStudentData: newStudentData } = this.state
                                    newStudentData.pincode = data.target.value
                                    this.setState({newStudentData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='session'>Session</Label>
                            <Input 
                                id="session"
                                value={this.state.updateStudentData.session}
                                onChange={(data) => {
                                    // let{ updateStudentData: newStudentData } = this.state
                                    // newStudentData.studentName = data.target.value
                                    // this.setState({newStudentData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='department'>Department</Label>
                            <Input 
                                id="department"
                                value={this.state.updateStudentData.department}
                                onChange={(data) => {
                                    // let{ updateCourseData: newCourseData } = this.state
                                    // newCourseData.no_of_seats = data.target.value
                                    // this.setState({newCourseData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='semester'>Semester</Label>
                            <Input 
                                id="semester"
                                value={this.state.updateStudentData.semester}
                                onChange={(data) => {
                                    // let{ updateCourseData: newCourseData } = this.state
                                    // newCourseData.no_of_seats = data.target.value
                                    // this.setState({newCourseData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='cgpa'>CGPA</Label>
                            <Input 
                                id="cgpa"
                                value={this.state.updateStudentData.cgpa}
                                onChange={(data) => {
                                    let{ updateStudentData: newStudentData } = this.state
                                    newStudentData.cgpa = data.target.value
                                    this.setState({newStudentData})
                                }}
                            />
                        </FormGroup>
                    </ModalBody>
                    <ModalFooter>
                        <Button color="primary" onClick={this.updateStudent.bind(this)}> Update Student</Button>
                        <Button color="secondary" onClick={this.toggleFormModal.bind(this)}> Cancel </Button>
                    </ModalFooter>
                </Modal>

            </div>
        );
    }
}

if(document.getElementById('manage-stud-listing-table')){
    ReactDOM.render(<ManageStudentTable />, document.getElementById('manage-stud-listing-table'))
}