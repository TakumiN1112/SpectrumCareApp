import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

import { EventPage } from '../event/event';
import { SettingPage } from '../setting/setting';
import { SopPage } from '../sop/sop';
import { WelcomePage } from '../welcome/welcome';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(public navCtrl: NavController) {

  }
  goWelcome(){
	this.navCtrl.push(WelcomePage);
  }
  goEvent(){
	this.navCtrl.push(EventPage);
  }
  goSetting(){
	this.navCtrl.push(SettingPage);
  }
  goSop(){
	this.navCtrl.push(SopPage);
  }
}
