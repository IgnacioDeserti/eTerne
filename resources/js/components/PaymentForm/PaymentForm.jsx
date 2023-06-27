import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom/client';
//import flatpickr from 'flatpickr';
import Cards from 'react-credit-cards';
import 'react-credit-cards/es/styles-compiled.css';

const PaymentForm = () => {
    const [cardNumber, setCardNumber] = useState('');
    const [cardholderName, setCardholderName] = useState('');
    const [expiryMonth, setExpiryMonth] = useState('');
    const [expiryYear, setExpiryYear] = useState('');
    const [securityCode, setSecurityCode] = useState('');

    useEffect(() => {
        // Inicializa el objeto Decidir
        const decidir = new window.Decidir({
            // Configura la SDK con tu public API Key
            publicKey: 'YOUR_PUBLIC_API_KEY'
        });

        // Establece el modo sandbox para pruebas
        decidir.setPublishableKey('YOUR_PUBLIC_API_KEY');
    }, []);

    const handleSubmit = event => {
        event.preventDefault();

        // Crea un objeto con los datos de la tarjeta
        const cardData = {
            card_number: cardNumber,
            card_expiration_month: expiryMonth,
            card_expiration_year: expiryYear,
            security_code: securityCode,
            card_holder_name: cardholderName,
            card_holder_identification: {
                type: 'dni',
                number: '12345678'
            }
        };

        // Crea un token de pago con los datos de la tarjeta
        decidir.createToken(cardData, (status, response) => {
            if (response.id) {
                // Token creado exitosamente
                // Envía el token al backend del comercio para realizar la transacción de pago
                fetch('/api/pay', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        token: response.id
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        // Procesa la respuesta del backend
                        // ...
                    })
                    .catch(error => {
                        // Maneja el error al enviar el token al backend
                        // ...
                    });
            } else {
                // Error al crear el token
                // Muestra un mensaje de error al usuario
                // ...
            }
        });
    };

    function handleCardNumberChange(e) {
        const value = e.target.value;
        if (/^\d*$/.test(value)) {
            setCardNumber(value);
        }
    }

    function handleCardholderNameChange(e) {
        const value = e.target.value;
        if (/^[a-zA-Z\s]*$/.test(value)) {
            setCardholderName(value);
        }
    }

    function handleExpiryMonthChange(e) {
        const value = e.target.value;
        if (/^\d*$/.test(value) && value.length <= 2) {
            setExpiryMonth(value);
        }
    }

    function handleExpiryYearChange(e) {
        const value = e.target.value;
        if (/^\d*$/.test(value) && value.length <= 4) {
            setExpiryYear(value);
        }
    }

    function handleSecurityCodeChange(e) {
        const value = e.target.value;
        if (/^\d*$/.test(value) && value.length <= 4) {
            setSecurityCode(value);
        }
    }

    return (
        <>
                <Cards
            number={cardNumber}
            name={cardholderName}
            expiry={`${expiryMonth}/${expiryYear}`}
            cvc={securityCode}
            focused={''}
        />
            {/* <div className="credit-card">
                <div className="credit-card__logo">💳</div>
                <div className="credit-card__number">{cardNumber}</div>
                <div className="credit-card__info">
                    <div className="credit-card__name">{cardholderName}</div>
                    <div className="credit-card__expiry">{`${expiryMonth}/${expiryYear}`}</div>
                </div>
            </div> */}
            <form className='form' onSubmit={handleSubmit}>
                <div>
                    <label htmlFor="card-number">Número de tarjeta:</label>
                    <input type="text" id="card-number" value={cardNumber} onChange={handleCardNumberChange} maxLength={16} placeholder="Número de tarjeta"/>
                </div>
                <div>
                    <label htmlFor="cardholder-name">Nombre del titular:</label>
                    <input type="text" id="cardholder-name" value={cardholderName} onChange={handleCardholderNameChange} maxLength={16} placeholder='Nombre del titular'/>
                </div>
                <div>
                    <label htmlFor="expiry-month">Mes de vencimiento:</label>
                    <input type="text" id="expiry-month" value={expiryMonth} onChange={handleExpiryMonthChange} maxLength={2} placeholder='Mes de Vencimiento'/>
                </div>
                <div>
                    <label htmlFor="expiry-year">Año de vencimiento:</label>
                    <input type="text" id="expiry-year" value={expiryYear} onChange={handleExpiryYearChange} maxLength={2} placeholder='Año de Vencimiento'/>
                </div>
                <div>
                    <label htmlFor="security-code">Código de seguridad:</label>
                    <input type="text" id="security-code" value={securityCode} onChange={handleSecurityCodeChange} maxLength={3} placeholder='Código de seguridad'/>
                </div>
                <button type="submit">Pagar</button>
            </form>
        </>
    );
};

export default PaymentForm;

const rootElement = document.getElementById('paymentForm');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<PaymentForm />);
}
