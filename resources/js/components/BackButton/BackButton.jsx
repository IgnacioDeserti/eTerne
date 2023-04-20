import React from 'react';
import PropTypes from 'prop-types';

const BackButton = ({ onClick }) => {
    return (
        <button className="back-button" onClick={onClick}>
            Volver atrás
        </button>
    );
};


export default BackButton;