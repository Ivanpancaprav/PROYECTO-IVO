import { Injectable } from '@angular/core';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http';
import { Paciente } from '../models/paciente.model';
import { Citas } from '../models/cita.model';
import { Observable } from 'rxjs';

const baseUrl = 'http://localhost/api/';

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {
  
  constructor(private Http: HttpClient) { }

   getPacientes(): Observable<Paciente[]>{
      return this.Http.get<Paciente[]>(baseUrl+'pacientes');
   }


   getPerfil(dni:string): Observable<Paciente>{

    return this.Http.get(baseUrl+'perfil/'+dni);
 }




 getCitas(): Observable<Citas[]>{
  return this.Http.get<Citas[]>(baseUrl+'citas');
}
}
