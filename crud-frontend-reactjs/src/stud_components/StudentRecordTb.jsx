import React, {useState, useEffect} from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {Container, Table, Form} from 'react-bootstrap';
import './css_components/studRecTable.css';
import './css_components/studRec.css';
import axios from 'axios';

export const StudRecTable =() =>{
        const [active, setActive]=useState(false); 
        const [studentId, setStudentId]=useState("");

        const [stud_name,setStudName]=useState("");
        const [stud_yr_lvl,setStudYrLvl]=useState("");
        const [stud_sec, setStudSec]=useState("");
        const [studentsData, setStudentsData]=useState([]);

        //get and view data records to table
        const fetchData=()=>{
            axios.get(`http://127.0.0.1:8000/api/students/`).then(response=>{
                setStudentsData(response.data);
            });
        }

        useEffect(() =>{
            fetchData();
        },[])

        //show data
        //insert new record
         const saveStudent = async(e)=>{
            e.preventDefault();
            let data={
                stud_name: stud_name,
                stud_yr_lvl:stud_yr_lvl,
                stud_sec: stud_sec
            }
            await axios.post('http://127.0.0.1:8000/api/insert',data);
                alert("Student Added Successfully");
                setStudName("");
                setStudSec("");
                setStudYrLvl("");
                fetchData();
        }

        //edit student record
        const editStudent= async(students, id)=>{
            
            active === true ? setStudName("") : setStudName(students.student_name)
            active === true ? setStudYrLvl("") : setStudYrLvl(students.student_year_level)
            active === true ? setStudSec("") : setStudSec(students.student_section)

            setStudentId(id);  
                                                     
            setActive(!active)
        }
        //Update records
        const updateStudent = async(e)=>{
         e.preventDefault();
         let data={
            stud_name: stud_name,
            stud_yr_lvl:stud_yr_lvl,
            stud_sec: stud_sec
        }
        await axios.put(`http://127.0.0.1:8000/api/update-student/${studentId}`,data);
            alert("Student Updated Successfully");
            setStudName("");
            setStudSec("");
            setStudYrLvl("");
            fetchData();
            setActive(false);
        }
        const cancel =(e)=>{
            e.preventDefault();
            setStudName("");
            setStudSec("");
            setStudYrLvl("");
            fetchData(); 
            setActive(false);
        }

        //delete records
        const deleteRecord =(e, id)=>{
            e.preventDefault();

            const thisClicked = e.currentTarget;
            thisClicked.innerText ="Deleting...";

            axios.delete(`http://127.0.0.1:8000/api/delete-record/${id}`).then
                (response=>{
                  if(response.data.status === 200){
                    alert(response.data.message);
                    fetchData();
                  }
                }
            )
        }

        return(
        <>
           <Container className='studRecord-con pt-4'>
                <h2 className="text-center pb-4">STUDENTS RECORDS</h2>

                <Form  className='studRecordForm m-3'>
                    <div className='d-md-flex flex-row gap-3 m-2'>
                        <Form.Group className="form-group w-100">
                            <Form.Label>Student Name</Form.Label>
                            <Form.Control type="text" value={stud_name} onChange={(e)=>setStudName(e.target.value)} autoComplete="off" placeholder="Enter  Student Name" />
                        </Form.Group>

                        <Form.Group className="form-group w-100" >
                            <Form.Label>Student Year Level</Form.Label>
                            <Form.Control type="text" value={stud_yr_lvl} onChange={(e)=>setStudYrLvl(e.target.value)}  autoComplete="off" placeholder="Enter Student Year Level" />
                        </Form.Group>

                        <Form.Group className="form-group w-100">
                            <Form.Label>Student Section</Form.Label>
                            <Form.Control type="text" value={stud_sec} onChange={(e)=>setStudSec(e.target.value)}  autoComplete="off" placeholder="Enter Student Section" />
                        </Form.Group>
                    </div>
                    <span></span>
                    <div className='d-flex justify-content-end pt-2 button-con '>
                        <div className='d-sm-flex flex button'>
                            <div className={`gap-3 cancel-update-btn  ${active ? 'cancel-update-btn-active':''}`}>
                            <button className= 'btn-update text-center' onClick={updateStudent}> UPDATE </button>
                            <button className= 'btn-update text-center' onClick={cancel}> CANCEL </button>
                            </div>
                            <button className={`btn-submit text-center m-3 ${active ? 'btn-submit-active':''}`}  onClick={saveStudent}> ADD STUDENT </button>
                       </div> 
                    </div>
                </Form>

            </Container>

            <Container className='table-con mt-2'>
             <Table className='text-center align-middle text-white table-record m-2'>
                <tbody>
                    {
                        studentsData.map((data) =>{
                            return(
                                <tr key={data.id}>
                                <td>{data.id}</td>
                                <td>{data.student_name}</td>
                                <td>{data.student_year_level}</td>
                                <td>{data.student_section}</td>
                                <td className='d-sm-flex flex-row gap-3 btn-con'>
                                    <button  onClick={(e) => editStudent(data, data.id)} className='btn-edit m-0 '>Edit</button>
                                    <button onClick={(e)=>deleteRecord(e, data.id)} className='btn-delete m-0 '>Delete</button>
                                </td>
                            </tr>  
                            );
                        })
                    }                  
                </tbody>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Student Year Level</th>
                        <th>Student Section</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </Table>
        </Container>
        </>
        );
    }