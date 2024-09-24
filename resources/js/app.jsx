import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import UserHomePage from './components/UserHomePage';

function App() {
    return (
        <Router>
            <h1>Dashboard</h1>
            <Routes>
                <Route path="/" element={<UserHomePage />} />
                <Route path="/dashboard" element={<UserHomePage />} /> {/* Match the dashboard route */}
                <Route path="*" element={<h2>404: Page Not Found</h2>} />
            </Routes>
        </Router>
    );
}

const rootElement = document.getElementById('app');
const root = createRoot(rootElement);
root.render(<App />);
