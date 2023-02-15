import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http';
import { Paciente } from '../models/paciente.model';
import { Citas } from '../models/cita.model';
import { Medicamentos } from '../models/medicamentos.model';
import { Informes} from '../models/informes.model';
import { Observable } from 'rxjs';

const baseUrl = 'http://localhost/api/';

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {
  [x: string]: any;

  constructor(private Http: HttpClient) { }

  getPacientes(): Observable<Paciente[]> {
    return this.Http.get<Paciente[]>(baseUrl + 'pacientes');
  }


  getPerfil(dni: string): Observable<Paciente>  {

    return this.Http.get(baseUrl + 'perfil/' + dni);
  }




 getCitas(tipo:number): Observable<Citas[]>{
  if(tipo==0){
  return this.Http.get<Citas[]>(baseUrl+'citas');
}else { return this.Http.get<Citas[]>(baseUrl+'citasprevias');}}

getMedicamentos(){

  return this.Http.get<Medicamentos[]>(baseUrl+'medicamentos');
}

getInformes(){

  return this.Http.get<Informes[]>(baseUrl+'informes');
}
}
