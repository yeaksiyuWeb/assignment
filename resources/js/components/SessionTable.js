import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { Button } from 'reactstrap';
import ConfirmationModal from "./ConfirmationModal";

export default class SessionTable extends Component {
    constructor(){
        super()
        this.state = {
            sessions: [],
            openConfirmModal: false,
            selectedSession: null,
        }
    }

    loadList() {
        axios.get('http://127.0.0.1:8000/api/sessions').then((response) => {   
            this.setState({
                sessions: response.data
            })
        })
    }

    deleteSession(id){
        axios.delete('http://127.0.0.1:8000/api/session/' + id, {
            
        }).then((response) => {
            this.loadList()
            this.setState((prevState) => ({
                openConfirmModal: !prevState.openConfirmModal,
            }));
        })
    }

    componentWillMount(){
        this.loadList();
    }

    toggleConfirmModal(session) {
        this.setState((prevState) => ({
            openConfirmModal: !prevState.openConfirmModal,
            selectedSession: session
        }));
    }

    render(){
        const {selectedSession} = this.state;

        let sessions = this.state.sessions.map((session) => {
            return(
                <tr>
                    <td>{session.id}</td>
                    <td>{session.session}</td>
                    <td>{session.created_at}</td>
                    <td>
                        <Button color="danger" onClick={() => this.toggleConfirmModal(session)}> Delete </Button>
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
                            <th>Session</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {sessions}
                    </tbody>
                </table>

                {selectedSession && (
                    <ConfirmationModal 
                        message={`Are you sure you want delete '${selectedSession.session}'?`}
                        isModalOpen={this.state.openConfirmModal}
                        toggleModal={() => this.toggleConfirmModal()}
                        handleAction={() => this.deleteSession(selectedSession.id)}
                    />
                )}

            </div>
        );
    }
}

if(document.getElementById('sess-listing-table')){
    ReactDOM.render(<SessionTable />, document.getElementById('sess-listing-table'))
}
