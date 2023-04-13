import React from 'react';
import PropTypes from 'prop-types';

const BackButton = ({ onClick }) => {
    return (
        <button className="back-button" onClick={onClick}>
            Volver atrás
        </button>
    );
};

BackButton.propTypes = {
    onClick: PropTypes.func.isRequired,
};

export default BackButton;