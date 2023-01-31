import { Injectable } from '@angular/core';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http';
import { Paciente } from '../models/paciente.model';
import { Observable } from 'rxjs';

const baseUrl = 'http://localhost/api/pacientes';

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {

<<<<<<< HEAD
=======
  constructor(private Http: HttpClient) {
    // this.url ="http://localhost/api/pacientes";
    this.url ="http://localhost/api/";
   }
>>>>>>> refs/remotes/origin/main

  constructor(private Http: HttpClient) { }

   getPacientes(): Observable<Paciente[]>{
      return this.Http.get<Paciente[]>(baseUrl);
   }

   getPerfil(){
    return this.Http.get(this.url+'perfil/29216450X');
 }
}
