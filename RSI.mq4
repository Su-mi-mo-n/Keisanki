int position = OrdersTotal();
 
double irsi1 = iRSI(NULL,0,14,PRICE_CLOSE,1);
double irsi2 = iRSI(NULL,0,14,PRICE_CLOSE,2);
 
  if(position < 1 && TimeMinute(TimeCurrent()) == 0)
 {
 if(irsi2 > 30 && 30 > irsi1)
 {
  OrderSend(NULL,OP_BUY,0.1,Ask,5,Bid - 0.2,Bid + 0.2,"L",123456,0,Red);
 }

 if(70 > irsi2 && irsi1 > 70)
 {
  OrderSend(NULL,OP_SELL,0.1,Bid,5,Bid + 0.2,Bid - 0.2,"S",123456,0,Blue);
 
 }
 }