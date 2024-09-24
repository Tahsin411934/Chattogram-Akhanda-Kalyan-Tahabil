import React from 'react';
import { NavLink, Outlet } from 'react-router-dom'; // Import Outlet for nested routes

const UserHomePage = () => {
  return (
    <div className="flex">
      {/* Sidebar */}
      <div className="w-1/4 p-5 bg-gray-200"> {/* Sidebar width and styling */}
        <div className="flex flex-col space-y-5">
          <NavLink to="/member/create" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Add New Member
          </NavLink>
          <NavLink to="/deposits/create" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Deposit
          </NavLink>
          <NavLink to="/withdrawals/create" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Withdraw
          </NavLink>
          <NavLink to="/receipt" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Receipt Print
          </NavLink>
          <NavLink to="/member-info" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Member Info
          </NavLink>
          <NavLink to="/another-action" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Another Action
          </NavLink>
          <NavLink to="/change-password" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
            Change Password
          </NavLink>
          <form method="POST" action="/logout">
            <button type="submit" className="bg-white btn p-3 shadow-inner border border-blue-400 text-xl font-semibold w-full">
              Log Out
            </button>
          </form>
        </div>
      </div>

      {/* Main Content */}
      <div className="flex-1 p-5"> {/* Main content area */}
        <h1 className="text-2xl font-bold">Welcome to User Home Page!</h1>
        <Outlet /> {/* This will render the nested routes' components */}
      </div>
    </div>
  );
};

export default UserHomePage;
