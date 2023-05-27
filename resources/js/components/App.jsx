import * as React from "react";
import {Routes, Route} from "react-router-dom";
import First from "./First";
import NavBar from "./NavBar";
import Example from "./Example";
import { BrowserRouter } from "react-router-dom";



export default function App(){
    return(
        <div className="App">
            <BrowserRouter>
                <Routes>
                    <Route path="/ITABackEnd/public/" element={<NavBar />} >
                        <Route index element={<Example />} />
                        <Route path="example" element={<Example />} />
                        <Route path="first" element={<First />} />
                    </Route>
                </Routes>
            </BrowserRouter>
        </div>
    );
}