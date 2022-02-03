int position = OrdersTotal();

double mac1 = iMACD(NULL,0,12,26,9,PRICE_CLOSE,MODE_MAIN,1);
double sig1 = iMACD(NULL,0,12,26,9,PRICE_CLOSE,MODE_SIGNAL,1);
double mac2 = iMACD(NULL,0,12,26,9,PRICE_CLOSE,MODE_MAIN,2);
double sig2 = iMACD(NULL,0,12,26,9,PRICE_CLOSE,MODE_SIGNAL,2);
 
double irsi1 = iRSI(NULL,0,14,PRICE_CLOSE,2);
double irsi2 = iRSI(NULL,0,14,PRICE_CLOSE,1);
double irsi3 = iRSI(NULL,0,14,PRICE_CLOSE,1);

 
  if(position < 1)
 {
 if(mac1 > sig1 && sig2 > mac2)
 {
  OrderSend(NULL,OP_BUY,0.1,Ask,5,Bid - 0.2,Bid + 0.2,"L",123456,0,Red);
 }
 } 
  if(position < 1)
 {
 if(sig1 > mac1 && mac2 > sig2)
 {
  OrderSend(NULL,OP_SELL,0.1,Bid,5,Bid + 0.2,Bid - 0.2,"S",123456,0,Blue);
 
 }
 }