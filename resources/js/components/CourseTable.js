import React, {Component} from "react";
import  ReactDOM  from "react-dom";
import axios from "axios";
import { Button } from "reactstrap";
import ConfirmModal from "./ConfirmModal";

export default class CourseTable extends Component {
    constructor(){
        super()
        this.state = {
            coursesData: [],
            openModal: false,
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

    componentWillMount(){
        this.loadList();
    }

    deleteCourse(id){
        axios.delete('http://127.0.0.1:8000/api/course/' + id).then((response) => {
            this.loadList()
            this.setState({
                openModal: false,
            })
        })
    }

    toggleConfirmModal(course) {
        this.setState((prevState) => ({
            openModal: !prevState.openModal,
            selectedCourse: course
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
                        <Button color="primary">Edit</Button>
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
                
                {this.state.openModal && selectedCourse && (
                    <ConfirmModal 
                        message={`Are you sure you want delete ${selectedCourse.course_code} ${selectedCourse.course_name}`}
                        isModalOpen={this.state.openModal}
                        toggleModal={() => this.toggleConfirmModal()}
                        handleAction={() => this.deleteCourse(selectedCourse.id)}
                    />
                )}
            </div>
        );
    }
}

if(document.getElementById('course-table')) {
    ReactDOM.render(<CourseTable />, document.getElementById('course-table'))
}
