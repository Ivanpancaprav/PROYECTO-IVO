import { Injectable } from '@angular/core';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http';
import { Paciente } from '../models/paciente.model';
import { Observable } from 'rxjs';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type':'application/json'
  })
}

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {
 public url:string;

  constructor(private http: HttpClient) {
    this.url ="http://localhost/api/";
   }

   getPacientes(): Observable<Paciente[]>{
      return this.http.get<Paciente[]>(this.url+'pacientes');
   }

   getPerfil(dni: string){
      return this.http.get(this.url+"perfil/"+dni);
   }
}
