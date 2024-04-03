;import React from "react";
import { Button, Modal, ModalBody, ModalFooter } from "reactstrap";

const ConfirmModal = ({message, toggleModal, handleAction, isModalOpen}) => {

    return(
        <Modal isOpen={isModalOpen} toggle={toggleModal} centered >
            <ModalBody>
                <p style={{fontSize: 16, fontFamily: 'sans-serif'}}>{message}</p>
            </ModalBody>
            <ModalFooter>
                <Button color="primary" onClick={handleAction}>Confrim</Button>
                <Button color="danger" onClick={toggleModal} >Cancel</Button>
            </ModalFooter>
        </Modal>
    );
};

export default ConfirmModal;