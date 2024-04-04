import React, {Component} from "react";
import  ReactDOM  from "react-dom";
import axios from "axios";
import { Button, FormGroup, Modal, ModalBody, ModalHeader, Label, Input, ModalFooter} from "reactstrap";
import ConfirmationModal from "./ConfirmationModal";

export default class CourseTable extends Component {
    constructor(){
        super()
        this.state = {
            coursesData: [],
            updateCourseData: {id:"", course_code:"", course_name:"", course_unit:"", no_of_seats:""},
            openConfirmModal: false,
            openFormModal: false,
            selectedCourse: null,
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/courses').then((response) => {
            this.setState({
                coursesData: response.data
            })
        })
    }

    componentWillMount() {
        this.loadList();
    }

    callUpdateCourse(id, course_code, course_name, course_unit, no_of_seats) {
        this.setState({
            updateCourseData:{id, course_code, course_name, course_unit, no_of_seats},
            openFormModal: !this.state.openConfirmModal
        })
    }

    updateCourse() {
        let {id, course_code, course_name, course_unit, no_of_seats} = this.state.updateCourseData;
        axios.put('http://127.0.0.1:8000/api/course/' + this.state.updateCourseData.id, {
            course_code, course_name, course_unit, no_of_seats
        }).then((response) => {
            this.loadList()
            this.setState({
                openFormModal: false,
                updateCourseData: {id:"", course_code:"", course_name:"", course_unit:"", no_of_seats:""},
            })
            alert(`course ${id} is updated`)
            
        })
    }

    deleteCourse(id) {
        axios.delete('http://127.0.0.1:8000/api/course/' + id).then((response) => {
            this.loadList()
            this.setState({
                openConfirmModal: false,
                selectedCourse: null
            })
        })
    }

    toggleConfirmModal(course) {
        this.setState((prevState) => ({
            openConfirmModal: !prevState.openConfirmModal,
            selectedCourse: course ? course : null
        }));
    }

    toggleFormModal() {
        this.setState((prevState) => ({
            openFormModal: !prevState.openFormModal,
        }));
    }


    render(){
        const {selectedCourse} = this.state;

        let courseTableBody = this.state.coursesData.map((course) => {
            return(
                <tr key={course.id}>
                    <td>{course.id}</td>
                    <td>{course.course_code}</td>
                    <td>{course.course_name}</td>
                    <td>{course.course_unit}</td>
                    <td>{course.no_of_seats}</td>
                    <td>{course.created_at}</td>
                    <td >
                        <Button 
                            style={{marginRight: 10}}
                            color="primary" 
                            onClick={
                                this.callUpdateCourse.bind(this, course.id, course.course_code, course.course_name, course.course_unit, course.no_of_seats)
                            }
                        >Edit</Button>
                        <Button 
                            color="danger"
                            onClick={() => this.toggleConfirmModal(course)}
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
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Course Unit</th>
                            <th>Seat Limit</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {courseTableBody}
                    </tbody>
                </table>
                
                {selectedCourse && (
                    <ConfirmationModal 
                        message={`Are you sure you want delete ${selectedCourse.course_code} ${selectedCourse.course_name}`}
                        isModalOpen={this.state.openConfirmModal}
                        toggleModal={() => this.toggleConfirmModal()}
                        handleAction={() => this.deleteCourse(selectedCourse.id)}
                    />
                )}

                <Modal isOpen={this.state.openFormModal} toggle={this.toggleFormModal.bind(this)} centered>
                    <ModalHeader toggle={this.toggleFormModal.bind(this)}> Update Course</ModalHeader>
                    <ModalBody>
                        <FormGroup>
                            <Label for='course_code'>Course Code</Label>
                            <Input 
                                id="course_code"
                                value={this.state.updateCourseData.course_code}
                                onChange={(data) => {
                                    let{ updateCourseData: newCourseData } = this.state
                                    newCourseData.course_code = data.target.value
                                    this.setState({newCourseData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='course_name'>Course Name</Label>
                            <Input 
                                id="course_name"
                                value={this.state.updateCourseData.course_name}
                                onChange={(data) => {
                                    let{ updateCourseData: newCourseData } = this.state
                                    newCourseData.course_name = data.target.value
                                    this.setState({newCourseData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='course_unit'>Course Unit</Label>
                            <Input 
                                id="course_unit"
                                value={this.state.updateCourseData.course_unit}
                                onChange={(data) => {
                                    let{ updateCourseData: newCourseData } = this.state
                                    newCourseData.course_unit = data.target.value
                                    this.setState({newCourseData})
                                }}
                            />
                        </FormGroup>
                        <FormGroup>
                            <Label for='no_of_seats'>Seat Limit</Label>
                            <Input 
                                id="no_of_seats"
                                value={this.state.updateCourseData.no_of_seats}
                                onChange={(data) => {
                                    let{ updateCourseData: newCourseData } = this.state
                                    newCourseData.no_of_seats = data.target.value
                                    this.setState({newCourseData})
                                }}
                            />
                        </FormGroup>
                    </ModalBody>
                    <ModalFooter>
                        <Button color="primary" onClick={this.updateCourse.bind(this)}> Update Course</Button>
                        <Button color="secondary" onClick={this.toggleFormModal.bind(this)}> Cancel </Button>
                    </ModalFooter>
                </Modal>
            </div>
        );
    }
}

if(document.getElementById('course-table')) {
    ReactDOM.render(<CourseTable />, document.getElementById('course-table'))
}
