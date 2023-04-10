import React from 'react';

const Footer = () => {
  return (
    <div className="footer-container">
      <ul className="contact-info">
        <li><i className="fas fa-map-marker-alt"></i> 1234 Calle Falsa, Ciudad Ficticia</li>
        <li><i className="fas fa-phone"></i> (123) 456-7890</li>
        <li><i className="fas fa-envelope"></i> info@tusitio.com</li>
      </ul>
      <div className="social-icons">
        <a target="_blank" href="https://www.whatsapp.com/"><i className="fab fa-whatsapp"></i></a>
        <a target="_blank" href="https://www.instagram.com/"><i className="fab fa-instagram"></i></a>
        <a target="_blank" href="https://twitter.com/"><i className="fab fa-twitter"></i></a>
      </div>
    </div>
  );
};

export default Footer;