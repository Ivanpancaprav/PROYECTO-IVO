import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { TokenStorageService } from '../_services/token-storage.service';

@Injectable({
  providedIn: 'root'
})
export class PacienteGuard implements CanActivate {
  protected currentUser: any;

  constructor(private token: TokenStorageService, private router:Router){}
  
  
  canActivate(route: ActivatedRouteSnapshot, stat:RouterStateSnapshot): boolean{
    
    this.currentUser = this.token.getUser();
  
    if(this.currentUser.success.role == "medico"){
    
      return true;

    }else{

      return false;
    }

  }
  
}
